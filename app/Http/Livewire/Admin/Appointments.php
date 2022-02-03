<?php

namespace App\Http\Livewire\Admin;

use App\Http\Traits\AppointmentTrait;
use App\Http\Traits\ApplicantTrait;
use App\Http\Traits\MailTrait;
use App\Models\Applicant;
use App\Rules\CheckSocialSecurityNumber;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Appointments extends Component
{
    use AppointmentTrait; use ApplicantTrait; use MailTrait;

    public $phase = 1;
    public $name;
    public $email;
    public $phone;
    public $socialSecurityNumber;
    public $zip;
    public $city;
    public $street;
    public $status = 0;
    public $medicalExamination;
    public $medicalExaminations;
    public $medicalExaminationId;
    public $doctors = [];
    public $doctor;
    public $consultations = [];
    public $consultation;
    public $appointments = [];
    public $appointment;
    public $submitButton = false;

    protected $listeners = ['getDoctors' => 'getDoctors', 'getConsultations' => 'getConsultations', 'getActiveMedicalExaminations' => 'getActiveMedicalExaminations', 'getAppointments' => 'getAppointments', 'toggleSubmitButton' => 'toggleSubmitButton'];

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'phone' => 'required|min:12',
        'socialSecurityNumber' => 'required|numeric',
        'zip' => 'required|numeric',
        'city' => 'required',
        'street' => 'required'
    ];

    public function mount()
    {
        $this->medicalExaminations = $this->getActiveMedicalExaminations();
    }

    public function render()
    {
        return view('livewire.admin.appointments')
            ->layout('components.layouts.admin');
    }

    public function save()
    {
        $this->validate();

        $isBlackListed = $this->checkSocialSecurityNumber($this->socialSecurityNumber);

        if ($isBlackListed) {
            return $this->addError('socialSecurityNumber', 'Ez a Taj-szám tiltva van a rendszerünkben!');
        }

        $applicant = $this->createApplicant();

        $appointment = $this->createAppointment($applicant->id);

        // $this->sendMessages($appointment, $applicant);

        session()->flash('success', 'Sikeresen felvette az új időpontot!');
		return redirect()->route('admin.appointment');
    }

    public function toggleSubmitButton()
    {
        $this->submitButton != $this->submitButton;
    }

    public function previousPhase()
    {
        $this->phase != 1 
            ? $this->phase--
            : null;
    }

    public function nextPhase()
    {
        if ($this->phase == 2) {
            $this->validate();
        }

        $this->phase != 3 
            ? $this->phase++
            : null;
    }
}
