<?php

namespace App\Http\Traits;
use App\Models\Applicant;
use App\Models\Appointment;

trait AppointmentTrait {
    public function createApplicant()
    {
        return Applicant::firstOrCreate([
            'social_security_number' => $this->socialSecurityNumber,
        ],
        [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'zip' => $this->zip,
            'city' => $this->city,
            'street' => $this->street
        ]);
    }

    public function createAppointment($applicantId)
    {
        $times = explode(',', $this->appointment);

        return Appointment::create([
            'consultation_id' => $this->consultation,
            'medical_examination_id' => $this->medicalExaminationId,
            'applicant_id' => $applicantId,
            'start_at' => $times[0],
            'end_at' => $times[1]
        ]);
    }
}
