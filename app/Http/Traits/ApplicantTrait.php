<?php

namespace App\Http\Traits;

use App\Models\Consultation;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalExamination;
use App\Models\Applicant;
use App\Models\Appointment;

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

            $medicalExamination = MedicalExamination::query()
                 ->whereSlug($this->medicalExamination)
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

        $this->consultations = Consultation::query()
            ->where('user_id', $this->doctor)
            ->where('is_digital', $this->medicalExamination === 'on-line-konzultacio' ? 1 : 0)
            ->where('day', '>', $this->medicalExaminationId === 2 ? now() : now()->addWeek())
            ->get();
    }

    public function getAppointments()
    {
        $this->appointments = [];

        $consultation = Consultation::find($this->consultation);
        $medicalExamination = MedicalExamination::query()
            ->whereSlug($this->medicalExamination)
            ->first();

        $minutes = DB::table('doctor_medical_examination')
            ->where('user_id', $this->doctor)
            ->where('medical_examination_id', $medicalExamination->id)
            ->first()
            ->minutes;

        $starttime = $consultation->open;  // your start time
        $endtime = $consultation->close;  // End time
        $duration = $minutes;  // split by 30 mins

        $array_of_time = array ();
        $start_time    = strtotime ($starttime); //change to strtotime
        $end_time      = strtotime ($endtime); //change to strtotime

        $add_mins  = $duration * 60;

        while ($start_time <= $end_time) // loop between time
        {
            $array_of_time[] = date ("H:i", $start_time);
            $start_time += $add_mins; // to check endtie=me
        }

        $new_array_of_time = array ();
        for($i = 0; $i < count($array_of_time) - 1; $i++)
        {
            $new_array_of_time[] = ['start_at' => $array_of_time[$i], 'end_at' => $array_of_time[$i + 1]];
        }

        if ($consultation->appointments->isEmpty()) {
            $appointments = $new_array_of_time;
        } else {

            foreach($new_array_of_time as $key => $time) {
                foreach($consultation->appointments as $appointment) {

                    if (($time['start_at'] <= $appointment['end_at']) && ($time['end_at'] >= $appointment['start_at'])) {
                        \Arr::pull($new_array_of_time, $key);
                    }

                }
            }

            $appointments = $new_array_of_time;
        }

        $this->appointments = $appointments;
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
