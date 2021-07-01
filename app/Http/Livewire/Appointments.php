<?php

namespace App\Http\Livewire;

use App\Http\Traits\AppointmentTrait;
use App\Http\Traits\ApplicantTrait;
use App\Http\Traits\MailTrait;
use App\Rules\CheckSocialSecurityNumber;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Appointments extends Component
{
    use AppointmentTrait; use ApplicantTrait; use MailTrait;

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
        // 'socialSecurityNumber' => 'required',
        // 'socialSecurityNumber' => [
        //     // 'required',
        //     // 'numeric',
        //     new CheckSocialSecurityNumber()
        // ],
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
        return view('livewire.appointments')
            ->layout('components.layouts.app');
    }

    public function save()
    {
        $this->validate();

        $applicant = $this->createApplicant();

        $appointment = $this->createAppointment($applicant->id);

        $this->sendMessages($appointment, $applicant);

        return redirect()->route('appointments.greeting', [
            'appointment' => $appointment
        ]);
    }

    public function toggleSubmitButton()
    {
        $this->submitButton != $this->submitButton;
    }

}
