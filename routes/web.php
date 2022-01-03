<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Consultations\Index as ConsultationsIndex;
use App\Http\Livewire\Admin\Consultations\Show as ConsultationsShow;
use App\Http\Livewire\Admin\Appointments as AdminAppointments;
use App\Http\Livewire\Appointments;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Admin\Applicant\Index as ApplicantIndex;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;
use SimplePay\SimplePayStart;

// $config = config('site.simplepay');
// $trx = new SimplePayStart;
//
// $currency = 'HUF';
// $trx->addData('currency', $currency);
//
// $trx->addConfig($config);
//
// //ORDER PRICE/TOTAL
// //-----------------------------------------------------------------------------------------
// $trx->addData('total', 20005);
//
// $trx->addData('orderRef', str_replace(array('.', ':', '/'), "", @$_SERVER['SERVER_ADDR']) . @date("U", time()) . rand(1000, 9999));
//
// // customer's registration mehod
// // 01: guest
// // 02: registered
// // 05: third party
// //-----------------------------------------------------------------------------------------
// $trx->addData('threeDSReqAuthMethod', '02');
//
//
// // EMAIL
// // customer's email
// //-----------------------------------------------------------------------------------------
// $trx->addData('customerEmail', 'sdk_test@otpmobil.com');
//
//
// // LANGUAGE
// // HU, EN, DE, etc.
// //-----------------------------------------------------------------------------------------
// $trx->addData('language', 'HU');
//
//
// // TWO STEP
// // true, or false
// // If this field does not exist is equal false value
// // Possibility of two step needs IT support setting
// //-----------------------------------------------------------------------------------------
// [>
// if (isset($_REQUEST['twoStep'])) {
//     $trx->addData('twoStep', true);
// }
// */
//
// // TIMEOUT
// // 2018-09-15T11:25:37+02:00
// //-----------------------------------------------------------------------------------------
// $timeoutInSec = 600;
// $timeout = @date("c", time() + $timeoutInSec);
// $trx->addData('timeout', $timeout);
//
//
// // METHODS
// // CARD or WIRE
// //-----------------------------------------------------------------------------------------
// $trx->addData('methods', array('CARD'));
//
//
// // REDIRECT URLs
// //-----------------------------------------------------------------------------------------
//
// // common URL for all result
// $trx->addData('url', $config['URL']);
//
// // uniq URL for every result type
// [>
//     $trx->addGroupData('urls', 'success', $config['URLS_SUCCESS']);
//     $trx->addGroupData('urls', 'fail', $config['URLS_FAIL']);
//     $trx->addGroupData('urls', 'cancel', $config['URLS_CANCEL']);
//     $trx->addGroupData('urls', 'timeout', $config['URLS_TIMEOUT']);
// */
//
//
// // Redirect from Simple app to merchant app
// //-----------------------------------------------------------------------------------------
// //$trx->addGroupData('mobilApp', 'simpleAppBackUrl', 'myAppS01234://payment/123456789');
//
//
// // INVOICE DATA
// //-----------------------------------------------------------------------------------------
// $trx->addGroupData('invoice', 'name', 'SimplePay V2 Tester');
// //$trx->addGroupData('invoice', 'company', '');
// $trx->addGroupData('invoice', 'country', 'hu');
// $trx->addGroupData('invoice', 'state', 'Budapest');
// $trx->addGroupData('invoice', 'city', 'Budapest');
// $trx->addGroupData('invoice', 'zip', '1111');
// $trx->addGroupData('invoice', 'address', 'Address 1');
// //$trx->addGroupData('invoice', 'address2', 'Address 2');
// //$trx->addGroupData('invoice', 'phone', '06201234567');
//
//
// // DELIVERY DATA
// //-----------------------------------------------------------------------------------------
// [>
// $trx->addGroupData('delivery', 'name', 'SimplePay V2 Tester');
// $trx->addGroupData('delivery', 'company', '');
// $trx->addGroupData('delivery', 'country', 'hu');
// $trx->addGroupData('delivery', 'state', 'Budapest');
// $trx->addGroupData('delivery', 'city', 'Budapest');
// $trx->addGroupData('delivery', 'zip', '1111');
// $trx->addGroupData('delivery', 'address', 'Address 1');
// $trx->addGroupData('delivery', 'address2', '');
// $trx->addGroupData('delivery', 'phone', '06203164978');
// */
//
//
// //payment starter element
// // auto: (immediate redirect)
// // button: (default setting)
// // link: link to payment page
// //-----------------------------------------------------------------------------------------
// $trx->formDetails['element'] = 'button';
//
//
// //create transaction in SimplePay system
// //-----------------------------------------------------------------------------------------
// $trx->runStart();
// dd($trx->getReturnData());
//
//
// //create html form for payment using by the created transaction
// //-----------------------------------------------------------------------------------------
// $trx->getHtmlForm();
//
//
// //print form
// //-----------------------------------------------------------------------------------------
// print $trx->returnData['form'];
//
//
// // test data
// //-----------------------------------------------------------------------------------------
// print "API REQUEST";
// print "<pre>";
// print_r($trx->getTransactionBase());
// print "</pre>";
//
// print "API RESULT";
// print "<pre>";
// print_r($trx->getReturnData());
// print "</pre>";
// dd($trx);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('{slug?}', 'App\Http\Controllers\PageController@index');
Route::get('/', 'App\Http\Controllers\PageController@index');
Route::get('orvosok/{slug}', [ 'as' => 'pages.doctor', 'uses' => 'App\Http\Controllers\PageController@doctor']);
Route::get('arak', [ 'as' => 'pages.prices', 'uses' => 'App\Http\Controllers\PageController@prices']);
Route::get('online-bejelentkezes-befejezese/{appointment}', 'App\Http\Controllers\PageController@greeting')
    ->name('appointments.greeting');


Route::get('online-bejelentkezes', Appointments::class)->name('appointments.index');
// Route::get('online-bejelentkezes', [ 'as' => 'appointments.index', 'uses' => 'AppointmentsController@index']);
// Route::post('online-bejelentkezes/uj-bejelentkezo', [ 'as' => 'appointments.store', 'uses' => 'AppointmentsController@store']);

// Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    // Route::get('register', Register::class)
    //     ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::get('email/verify', Verify::class)
    ->middleware('throttle:6,1')
    ->name('verification.notice');

Route::get('password/confirm', Confirm::class)
    ->name('password.confirm');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', Dashboard::class)
        ->name('home');
        // ->name('admin.dashboard');

    Route::get('rendelesek', ConsultationsIndex::class)
        ->name('admin.consultations.index');

    Route::get('rendelesek/{consultation}', ConsultationsShow::class)
        ->name('admin.consultations.show');

    Route::get('paciensek', ApplicantIndex::class)
        ->name('admin.applicant.index');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
