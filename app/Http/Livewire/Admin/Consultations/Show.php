<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Http\Traits\ApplicantTrait;
use App\Http\Traits\AppointmentTrait;
use App\Models\Appointment;
use App\Models\Consultation;
use Livewire\Component;

class Show extends Component
{
    use AppointmentTrait; use ApplicantTrait;

    public $appointments;
    public $consultation;
    public $createForm = false;
    public $columns = ['Rendelés', 'Vizsgálat típusa',  'Vizsgálat kezdete', 'Vizsgálat vége','Páciens neve', 'Taj-száma', 'Kontroll vizsgálat'];

    public function mount(Consultation $consultation)
    {
        $this->consultation = $consultation;
        $this->appointments = $this->consultation->appointments()->orderBy('start_at')->get();
    }

    public function render()
    {
        return view('livewire.admin.consultations.show')
            ->layout('components.layouts.admin');
    }

    public function export()
    {
        // $this->exportToday($this->consultation, $this->columns, $this->appointments);

        $consultation = $this->consultation;
        $data = $this->appointments;
        $columns = $this->columns;

        $fileName = \Str::slug($consultation->name) . '.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $callback = function() use($data, $columns, $consultation) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $item) {
                $row['consultation']  = $consultation->name;
                $row['medicalExamination']    = $item->medicalExamination->name;
                $row['start']    = $item->start_at;
                $row['end']  = $item->end_at;
                $row['applicant_name']  = $item->applicant->name;
                $row['social_security_number']  = $item->applicant->social_security_number;
                $row['control']  = '-';

                fputcsv($file, array($row['consultation'], $row['medicalExamination'], $row['start'], $row['end'], $row['applicant_name'], $row['social_security_number'], $row['control']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function blockAndDelete($appointment)
    {
        $this->blocked($appointment['applicant']['id']);
        $this->deleteAppointment($appointment['id']);

        session()->flash('success', 'A pácienst sikeren tiltotta és az időpontot törölte!');
    }

    public function delete($id)
    {
        $this->deleteAppointment($id);
    }
}
