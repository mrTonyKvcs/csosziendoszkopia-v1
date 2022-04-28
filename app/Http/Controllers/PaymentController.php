<?php

namespace App\Http\Controllers;

use App\Http\Traits\MailTrait;
use App\Models\Applicant;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;
use SimplePay\SimplePayStart;
use SimplePay\SimplePayBack;
use SimplePay\SimplePayIpn;
use Throwable;

class PaymentController extends Controller
{
	use MailTrait;

	protected $config;

	public function __construct()
	{
		$this->config = config('site.simplepay');
	}


	public function start(Request $request)
	{	
		$data = $request->all();
		$applicant = Applicant::find($data['applicant']);
		$appointment = Appointment::find($data['appointment']);

		$trx = new SimplePayStart();

		$currency = 'HUF';
		$trx->addData('currency', $currency);

		$trx->addConfig($this->config);
		$trx->addData('total', 5000);


		$trx->addItems(
			array(
				'ref' => 'CSE-' . $appointment->id,
				'title' => 'Vizsgálat: ' . $appointment->medicalExamination->name,
				'desc' => 'Vizsgálat előlege',
				'amount' => 1,
				'price' => 5000,
				// 'tax' => '27',
			)
		);

		$trx->addData('maySelectEmail', true);
		$trx->addData('maySelectInvoice', true);

		$trx->addData('orderRef', str_replace(array('.', ':', '/'), "", @$_SERVER['SERVER_ADDR']) . @date("U", time()) . rand(1000, 9999));


		$trx->addData('customer', $applicant->name);

		$trx->addData('threeDSReqAuthMethod', '02');


		$trx->addData('customerEmail', $applicant->email);


		$trx->addData('language', 'HU');


		if (isset($_REQUEST['twoStep'])) {
			$trx->addData('twoStep', true);
		}

		$timeoutInSec = 600;
		$timeout = @date("c", time() + $timeoutInSec);
		$trx->addData('timeout', $timeout);


		$trx->addData('methods', array('CARD'));


		$trx->addData('url', $this->config['URL']);

		// $trx->addGroupData('urls', 'success', $config['URLS_SUCCESS']);
		// $trx->addGroupData('urls', 'fail', $config['URLS_FAIL']);
		// $trx->addGroupData('urls', 'cancel', $config['URLS_CANCEL']);
		// $trx->addGroupData('urls', 'timeout', $config['URLS_TIMEOUT']);


		$trx->addGroupData('mobilApp', 'simpleAppBackUrl', 'myAppS01234://payment/123456789');


		$trx->addGroupData('invoice', 'name', $applicant->name);
		// $trx->addGroupData('invoice', 'company', '');
		$trx->addGroupData('invoice', 'country', 'hu');
		// $trx->addGroupData('invoice', 'state', 'Budapest');
		$trx->addGroupData('invoice', 'city', $applicant->city);
		$trx->addGroupData('invoice', 'zip', $applicant->zip);
		$trx->addGroupData('invoice', 'address', $applicant->street);
		// $trx->addGroupData('invoice', 'address2', 'Address 2');
		$trx->addGroupData('invoice', 'phone', $applicant->phone);

		$trx->formDetails['element'] = 'button';

		$trx->runStart();

		$trx->getHtmlForm();

		$appointment->payment()->create([
			'status' => Status::START_PAYMENT,
			'transaction_id' => $trx->returnData['transactionId'],
			'order_ref' => $trx->returnData['orderRef']
		]);
		
        return redirect()->to($trx->returnData['paymentUrl']);
	}

	public function back()
	{
		$trx = new SimplePayBack();

		$trx->addConfig($this->config);


		//result
		//-----------------------------------------------------------------------------------------
		$result = array();
		if (isset($_REQUEST['r']) && isset($_REQUEST['s'])) {
			if ($trx->isBackSignatureCheck($_REQUEST['r'], $_REQUEST['s'])) {
				$result = $trx->getRawNotification();
			}
		}

		if ($result['e'] === 'SUCCESS') {

			$payment = Payment::query()
				->where('transaction_id', $result['t'])
				->where('order_ref', $result['o'])
				->firstOrFail();
			
			$payment->update(['status' => Status::END_PAYMENT]);
			
			$appointment = $payment->paymentable;

			return redirect()->route('payments.greeting', $appointment->id);

		} else {
			$payment = Payment::query()
				->where('transaction_id', $result['t'])
				->where('order_ref', $result['o'])
				->firstOrFail();

			switch ($result['e']) {
				case 'CANCEL':
					$payment->update(['status' => Status::CANCEL_PAYMENT]);
					break;
				
				case 'FAIL':
					$payment->update(['status' => Status::FAIL_PAYMENT]);
					break;

				case 'TIMEOUT':
					$payment->update(['status' => Status::TIMEOUT_PAYMENT]);
					break;
			}

			return redirect()->route('pages.payment-error', $payment->id);
		}
	}

	public function ipn(Request $request)
	{
		foreach (getallheaders() as $name => $value) {
			Log::info("$name: $value\n");
		}


		$json = $request;
		Log::info($json);

		try {
			$json['receiveDate'] = now(); 

			return json_encode($json);
			// $trx = new SimplePayIpn;

			// $trx->addConfig($this->config);

			// // dd($json, $trx);


			// //check signature and confirm IPN
			// //-----------------------------------------------------------------------------------------
			// if ($trx->isIpnSignatureCheck($json)) {
			// 	/**
			// 	 * Generates all response
			// 	 * Puts signature into header
			// 	 * Print response body
			// 	 *
			// 	 * Use this OR getIpnConfirmContent
			// 	 */
			// 	$trx->runIpnConfirm();

			// 	/**
			// 	 * Generates all response
			// 	 * Gets signature and response body
			// 	 *
			// 	 * You must set signeature in header and you must print response body!
			// 	 *
			// 	 * Use this OR runIpnConfirm()
			// 	 */
			// 	// $confirm = $trx->getIpnConfirmContent();
			// }

		} catch (Throwable $e) {
			Log::error($e);
			dd($e);
		}

		//no need to print further information
		exit;
	}

	public function paymentError(Payment $payment)
    {
        return view('payments.error', [ 'transaction' => $payment]);
    }

    public function greeting(Appointment $appointment)
    {
        $transactionId = $appointment->payment->transaction_id;

        return view('payments.greeting', [
            'appointment'   => $appointment,
            'transactionId'      => $transactionId
        ]);
    }
}