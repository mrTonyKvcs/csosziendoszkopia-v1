<?php

namespace App\Http\Traits;

use App\Models\Invoice as InvoiceModel;
use SzamlaAgent\SzamlaAgentAPI;
use SzamlaAgent\Buyer;
use SzamlaAgent\Document\Invoice\Invoice;
use SzamlaAgent\Item\InvoiceItem;
use Illuminate\Support\Str;

trait InvoiceTrait
{
    public function createInvoiceModel($invoiceNumber)
    {
        return InvoiceModel::create([
            'slug' => Str::slug($invoiceNumber),
            'invoice_number' => $invoiceNumber
        ]);
    }

    public function createInvoice($data)
    {
        $applicant = $data->applicant;
        $medicalExamination = $data->medicalExamination->name;
        dd($applicant);
        $apiKey = config('site.szamlazzhu.KEY');
        $price = config('site.szamlazzhu.PRICE');
        $priceWithoutTax = $price / 1.27;
        $tax = $data['price'] - $priceWithoutTax;

        $agent = SzamlaAgentAPI::create($apiKey);
        // tony's api key
        // $agent = SzamlaAgentAPI::create('jhghwq8mypzhzjjefqcfwwmhqv4sfbyazafyexbpad');
        /**
         * Új papír alapú számla létrehozása
         *
         * Átutalással fizetendő magyar nyelvű (Ft) számla kiállítása mai keltezési és
         * teljesítési dátummal, +8 nap fizetési határidővel.
         */
        $invoice = new Invoice(Invoice::INVOICE_TYPE_E_INVOICE);
        // Vevő adatainak hozzáadása (kötelezően kitöltendő adatokkal)
        $invoice->setBuyer(new Buyer($applicant->name, $applicant->zip, $applicant->city, $applicant->street . ' ' . $applicant->house_number));
        // Számla tétel összeállítása alapértelmezett adatokkal (1 db tétel 27%-os ÁFA tartalommal)
        $item = new InvoiceItem($medicalExamination, $price);
        // Tétel nettó értéke
        $item->setNetPrice($priceWithoutTax);
        // Tétel ÁFA értéke
        $item->setVatAmount($tax);
        // Tétel bruttó értéke
        $item->setGrossAmount($price);
        // Tétel hozzáadása a számlához
        $invoice->addItem($item);

        // Számla elkészítése
        $result = $agent->generateInvoice($invoice);
        // Agent válasz sikerességének ellenőrzése
        if ($result->isSuccess()) {
            // echo 'A számla sikeresen elkészült. Számlaszám: ' . $result->getDocumentNumber();
            // Válasz adatai a további feldolgozáshoz
            // var_dump($result->getDataObj());
            return $result->getDocumentNumber();
        }
    }
}
