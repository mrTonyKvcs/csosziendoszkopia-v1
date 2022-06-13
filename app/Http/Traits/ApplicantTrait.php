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

		$type = MedicalExamination::query()
			->where('slug', $slug)
			->first()
			->type_id;

		$doctorId = isset($this->doctor->id)
			? $this->doctor->id
			: $this->doctor;	

        $this->consultations = Consultation::query()
			->where('type_id', $type)
            ->where('user_id', $doctorId)
            ->where('is_digital', $slug === 'on-line-konzultacio' ? 1 : 0)
            ->where('day', '>', $this->medicalExaminationId === 2 ? now()->addWeek() : now())
            ->get();
    }

    public function getAppointments()
    {
        $this->appointments = [];

		$consultationId = isset($this->consultation->id)
			? $this->consultation->id
			: $this->consultation;	

        $consultation = Consultation::find($consultationId);

		$slug = isset($this->medicalExamination->slug)
			? $this->medicalExamination->slug
			: $this->medicalExamination;	

        $medicalExamination = MedicalExamination::query()
            ->whereSlug($slug)
            ->first();

		$doctorId = isset($this->doctor->id)
			? $this->doctor->id
			: $this->doctor;	

        $minutes = DB::table('doctor_medical_examination')
            ->where('user_id', $doctorId)
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
                    if ($appointment->payment->status == 'SUCCESS') {

                        $appointment['start_at'] = Carbon::parse($appointment['start_at'])->subMinute()->format('H:i');

                        $appointment['end_at'] = Carbon::parse($appointment['end_at'])->subMinute()->format('H:i');

                        if (($time['start_at'] < $appointment['end_at']) && ($time['end_at'] > $appointment['start_at'])) {
                            \Arr::pull($new_array_of_time, $key);
                        }
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
