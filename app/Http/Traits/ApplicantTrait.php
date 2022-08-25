<?php

namespace App\Http\Traits;

use App\Models\Consultation;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalExamination;
use App\Models\Applicant;
use App\Models\Appointment;
use Carbon\Carbon;

trait ApplicantTrait
{
    public function checkSocialSecurityNumber($socialSecurityNumber)
    {
        $checkSocialSecurityNumber = Applicant::where('social_security_number', $socialSecurityNumber)
            ->where('is_black_listed', true)
            ->first();

        if (collect($checkSocialSecurityNumber)->isNotEmpty()) {
            return true;
        }

        return false;
    }

    public function getActiveMedicalExaminations()
    {
        $this->doctor = null;
        $this->doctors = [];
        $this->consultation = null;
        $this->consultations = [];
        $this->appointment = null;
        $this->appointments = [];

        return MedicalExamination::query()
            ->isActive()
            ->get();
    }

    public function getDoctors()
    {
        if ($this->medicalExamination != '') {
            $this->doctor = null;
            $this->doctors = [];
            $this->consultation = null;
            $this->consultations = [];
            $this->appointment = null;
            $this->appointments = [];

            $slug = isset($this->medicalExamination->slug)
                ? $this->medicalExamination->slug
                : $this->medicalExamination;

            $medicalExamination = MedicalExamination::query()
                 ->whereSlug($slug)
                 ->first();

            $this->medicalExaminationId = $medicalExamination->id;

            $this->doctors = $medicalExamination
                 ->doctors()
                 ->wherePivot('is_active', 1)
                 ->get();
        }
    }

    public function getConsultations()
    {
        $this->consultations = null;
        $this->appointment = null;
        $this->appointments = [];

        $slug = isset($this->medicalExamination->slug)
            ? $this->medicalExamination->slug
            : $this->medicalExamination;


        $examination = MedicalExamination::query()
            ->where('slug', $slug)
            ->first();

        $doctorId = isset($this->doctor->id)
            ? $this->doctor->id
            : $this->doctor;

        $typeId = DB::table('doctor_medical_examination')
            ->where('user_id', $doctorId)
            ->where('medical_examination_id', $examination->id)
            ->first()
            ->type;

        $this->consultations = Consultation::query()
            ->where('type_id', $typeId)
            ->where('user_id', $doctorId)
            ->where('is_digital', $slug === 'on-line-konzultacio' ? 1 : 0)
            ->where('day', '>', $this->medicalExaminationId === 2 ? now()->addDays(5) : now())
            ->whereHas('appointments', function ($q) {
                $q->whereNull('applicant_id');
            })
            ->orderBy('day')
            ->orderBy('open')
            ->get();
    }

    public function getAppointments()
    {
        $this->appointments = [];

        $consultationId = isset($this->consultation->id)
            ? $this->consultation->id
            : $this->consultation;

        $consultation = Consultation::find($consultationId);

        $this->appointments = $consultation->appointments()
            ->whereNull('applicant_id')
            ->orderBy('start_at')
            ->get();

        $this->submitButton = true;
    }

    public function blocked($id)
    {
        $applicant = Applicant::find($id);
        $applicant->update(['is_black_listed' => true]);
    }

    public function unBlocked($id)
    {
        $applicant = Applicant::find($id);
        $applicant->update(['is_black_listed' => false]);
    }
}
