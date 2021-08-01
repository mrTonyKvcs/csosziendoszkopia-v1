<?php

namespace App\Http\Livewire;

use App\Http\Traits\ApplicantTrait;
use App\Models\Applicant;
use App\Models\Consultation;
use Carbon\Carbon;
use Livewire\Component;

class Search extends Component
{
    use ApplicantTrait;

    public $searchTerm = '';
    public $rs = ['applicants' => [], 'consultations' => []];

    public function render()
    {
        if ($this->searchTerm != '') {
            $this->rs['applicants'] = Applicant::query()
                ->where('social_security_number', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('name', 'like', '%' . $this->searchTerm . '%')
                 ->get();

            $this->rs['consultations'] = Consultation::query()
                ->whereHas('office', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchTerm . '%');
                })
                ->orWhere('day', 'like', '%' . $this->searchTerm . '%')
                ->get();
        }

        return view('livewire.search');
    }

    public function export($consultationId)
    {
        // $this->exportToday($this->consultation, $this->columns, $this->appointments);
        $consultation = Consultation::find($consultationId);

        $data = $consultation->appointments;
        $columns = ['Rendelés', 'Vizsgálat típusa',  'Vizsgálat kezdete', 'Vizsgálat vége','Páciens neve', 'Taj-száma', 'Telefonszám','Kontroll vizsgálat'];


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
                $row['phone'] = $item->applicant->phone;
                $row['control']  = $this->checkControlExamination($item->id, $item->applicant->id);

                fputcsv($file, array($row['consultation'], $row['medicalExamination'], $row['start'], $row['end'], $row['applicant_name'], $row['social_security_number'], $row['phone'], $row['control']));
            }

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function blockedApplicant($id)
    {
        $this->blocked($id);

        session()->flash('success', 'Sikeresen tiltotta a pácienst!');
    }

    public function unBlockedApplicant($id)
    {
        $this->unBlocked($id);

        session()->flash('success', 'Sikeresen feloldotta a tiltásat a páciensnek!');
    }
}
