<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Http\Traits\AppointmentTrait;

class ConsultationExport implements FromCollection, WithMapping, WithHeadings
{
    use AppointmentTrait;

    protected $data;

    public function __construct(object $data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function headings():array{
        return[
            'Rendelés',
            'Vizsgálat típusa', 
            'Vizsgálat kezdete',
            'Vizsgálat vége',
            'Páciens neve',
            'Taj-száma',
            'Telefonszám',
            // 'Kontroll vizsgálat'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }

    /**
    * @var Invoice $invoice
    */
    public function map($item): array
    {
        return [
            $item->consultation->name,
            $item->medicalExamination->name ?? null,
            $item->start_at,
            $item->end_at,
            $item->applicant->name ?? null,
            $item->applicant->social_security_number ?? null,
            $item->applicant->phone ?? null,
            // $this->checkControlExamination($item->id ?? null, $item->applicant->id ?? null)
        ];
    }
}
