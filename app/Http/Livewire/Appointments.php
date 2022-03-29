<?php

namespace App\Http\Livewire;

use App\Http\Traits\AppointmentTrait;
use App\Http\Traits\ApplicantTrait;
use App\Http\Traits\MailTrait;
use App\Models\Applicant;
use App\Rules\CheckSocialSecurityNumber;
use Livewire\Component;
use App\Models\Consultation;
use App\Models\MedicalExamination;
use App\Models\User;
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
    public $gdpr = false;
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
	public $selectMedical = false;
	public $selectDoctor = false;
	public $selectConsultation = false;
	public $selectAppointment = false;

    protected $listeners = ['getDoctors' => 'getDoctors', 'getConsultations' => 'getConsultations', 'getActiveMedicalExaminations' => 'getActiveMedicalExaminations', 'getAppointments' => 'getAppointments', 'toggleSubmitButton' => 'toggleSubmitButton'];

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'phone' => 'required|min:12',
        'socialSecurityNumber' => 'required|numeric',
        'zip' => 'required|numeric',
        'city' => 'required',
        'street' => 'required',
    ];

    public function mount()
    {
        $this->medicalExaminations = $this->getActiveMedicalExaminations();

        //Test data
        $this->name = 'Teszt User';
        $this->email = "attila.kovacs92@gmail.com";
        $this->phone = '+36704567890';
        $this->socialSecurityNumber = '5564654454545';
        $this->zip = 600;
        $this->city = "Kecskemet";
        $this->street = 'Teszt utca 30.';
        $this->gdpr = true;
    }

    public function render()
    {
        return view('livewire.appointments')
            ->layout('components.layouts.app');
    }

    public function save()
    {
        // $this->validate();

        $isBlackListed = $this->checkSocialSecurityNumber($this->socialSecurityNumber);

        if ($isBlackListed) {
            return $this->addError('socialSecurityNumber', 'Ez a Taj-szám tiltva van a rendszerünkben!');
        }

        $applicant = $this->createApplicant();

        $appointment = $this->createAppointment($applicant->id);

        return redirect()->route('payment.start', [
            'applicant' => $applicant,
            'appointment' => $appointment
        ]);
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

	public function setActiveMedical($id)
	{
		$this->medicalExamination = MedicalExamination::find($id);
		$this->selectMedical = false;
		$this->getDoctors();
	}

	public function setActiveDoctor($id)
	{
		$this->doctor = User::find($id);
		$this->selectDoctor = false;
		$this->getConsultations();
	}

	public function setActiveConsultation($id)
	{
		$this->consultation = Consultation::find($id);
		$this->selectConsultation = false;
		$this->getAppointments();
	}

	public function setActiveAppointment($id)
	{
		$this->appointment = $this->appointments[$id];
		$this->selectAppointment = false;
	}
}
