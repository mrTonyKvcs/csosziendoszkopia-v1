<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Http\Traits\ApplicantTrait;
use App\Http\Traits\AppointmentTrait;
use App\Models\Appointment;
use App\Models\Consultation;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ConsultationExport;
use App\Models\MedicalExamination;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Show extends Component
{
    use AppointmentTrait;
    use ApplicantTrait;

    public $archive = false;
    public $appointments;
    public $consultation;
    public $createForm = false;
    public $columns = ['Vizsgálat kezdete', 'Vizsgálat vége', 'Vizsgálat típusa', 'Páciens neve', 'Taj-száma'];
    public $name;
    public $email;
    public $phone;
    public $socialSecurityNumber;
    public $activeAppointment;
    public $medicalExaminations = [];
    public $activeMedicalExamination;
    public $day;
    public $doctor;

    public function mount($doctor, $consultation)
    {
        $this->archive = $consultation > now()->format('Y-m-d') ? false : true;
        $this->day = $consultation;
        $this->doctor = User::find($doctor);
        $this->appointments = Appointment::whereHas('consultation', function ($q) use ($consultation, $doctor) {
            $q->where('day', $consultation)
                ->whereHas('user', function ($q) use ($doctor) {
                    $q->where('id', $doctor);
                });
        })->get();
        // $this->consultation = $consultation;
        // $this->appointments = $this->consultation->appointments()->orderBy('start_at')->get();
    }

    protected $rules = [
        'activeMedicalExamination' => 'required',
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin.consultations.show')
            ->layout('components.layouts.admin');
    }

    public function showApplicantForm($appointmentId)
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->socialSecurityNumber = '';
        $this->activeAppointment = null;
        $this->medicalExaminations = [];
        $this->activeMedicalExamination = [];
        $this->activeAppointment = Appointment::find($appointmentId);
        $medicalExaminationsIds = DB::table('doctor_medical_examination')
            ->where('user_id', $this->activeAppointment->consultation->user_id)
            ->where('type', $this->activeAppointment->consultation->type_id)
            ->pluck('medical_examination_id')
            ->toArray();

        $this->medicalExaminations = MedicalExamination::whereIn('id', $medicalExaminationsIds)->get();

        $this->createForm = true;
    }

    public function addApplicantToAppointment()
    {
        $this->validate();

        $this->addNewApplicantToAppointment();

        $this->createForm = false;
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->socialSecurityNumber = '';
        $this->activeAppointment = null;
        $this->medicalExaminations = [];
        $this->activeMedicalExamination = [];
        $this->appointments = [];
        $consultation = $this->consultation;
        $doctor = $this->doctor->id;
        $this->appointments = Appointment::whereHas('consultation', function ($q) use ($consultation, $doctor) {
            $q->where('day', $consultation)
                ->whereHas('user', function ($q) use ($doctor) {
                    $q->where('id', $doctor);
                });
        })->get();

        session()->flash('success', 'Sikeresen felvitte az adatokat!');
    }

    public function export()
    {
        $data = $this->appointments;

        return Excel::download(new ConsultationExport($data), \Str::slug($this->day) . '.xlsx');
    }

    public function cancelAppointment($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);

        $appointment->update([
            'medical_examination_id' => null,
            'applicant_id' => null
        ]);
        $this->appointments = [];
        $consultation = $this->consultation;
        $doctor = $this->doctor->id;
        $this->appointments = Appointment::whereHas('consultation', function ($q) use ($consultation, $doctor) {
            $q->where('day', $consultation)
                ->whereHas('user', function ($q) use ($doctor) {
                    $q->where('id', $doctor);
                });
        })->get();
        session()->flash('success', 'Sikeresen megtörtént az időpont lemondása!');
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
