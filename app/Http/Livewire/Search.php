<?php

namespace App\Http\Livewire;

use App\Http\Traits\ApplicantTrait;
use App\Models\Applicant;
use App\Models\Consultation;
use Carbon\Carbon;
use Livewire\Component;
use App\Exports\ConsultationExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $consultation = Consultation::find($consultationId);

        $data = $consultation->appointments()->orderBy('start_at')->get();

        return Excel::download(new ConsultationExport($data), \Str::slug($consultation->name) . '.xlsx');
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
