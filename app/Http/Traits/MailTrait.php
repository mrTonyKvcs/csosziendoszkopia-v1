<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Mail;

trait MailTrait {
    public function sendMessages($appointment, $applicant)
    {
        $applicant->doctorName = $appointment->consultation->user->name;
        $applicant->appointment = $appointment->consultation->nameWithoutTime . ' ' . $appointment->start_at . ' - ' . $appointment->end_at;

        $applicant->medicalExamination = $appointment->medicalExamination->slug;

        $applicant->startAt = $appointment->start_at;

        Mail::send('emails.new-applicant', $applicant->toArray(), function($message) use ($appointment) {
            // $message->to([$appointment->consultation->user->email])
            $message->to('csosziendoszkopia@gmail.com')
                    ->subject('Új online bejelentkezes: ' .  $appointment->applicant->social_security_number);
        });

        Mail::send('emails.info', $applicant->toArray(), function($message) use ($appointment) {
            $message->to([$appointment->applicant->email])
                    ->subject('Sikeres online időpontfoglalás és fizetés');
        });
    }
}
