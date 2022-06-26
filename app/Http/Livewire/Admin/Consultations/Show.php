<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Http\Traits\ApplicantTrait;
use App\Http\Traits\AppointmentTrait;
use App\Models\Appointment;
use App\Models\Consultation;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ConsultationExport;

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

        return Excel::download(new ConsultationExport($data), \Str::slug($consultation->name) . '.xlsx');
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
