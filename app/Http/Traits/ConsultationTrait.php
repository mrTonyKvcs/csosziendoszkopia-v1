<?php

namespace App\Http\Traits;

use App\Models\Appointment;
use App\Models\Consultation;
use Carbon\Carbon;

trait ConsultationTrait
{
    public function createNewConsultation()
    {
        $consultation = Consultation::updateOrCreate(
        [
			'type_id' => $this->newConsultation['type_id'],
            'user_id' => $this->newConsultation['user_id'],
            'office_id' => $this->newConsultation['office_id'],
            'day' => $this->newConsultation['day'],
            'is_digital' => $this->newConsultation['is_digital'],
            'open' => $this->newConsultation['open'],
            'close' => $this->newConsultation['close'],
        ],
        );

        $this->generateAppointments($consultation);
    }

    public function generateAppointments($consultation)
    {
		$consultationId = $consultation->id;

        $consultation = Consultation::find($consultationId);

        $minutes = $consultation->type->minutes;

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

        array_pop($array_of_time);

        foreach($array_of_time as  $started_at) {
            Appointment::create([
                'consultation_id' => $consultation->id,
                'start_at' => Carbon::parse($started_at)->format('H:i'),
                'end_at' => Carbon::parse($started_at)->addMinutes($minutes)->format('H:i')
            ]);
        }
    }

    public function updateOrGenerateAppointments($consultation)
    {
		$consultationId = $consultation->id;

        $consultation = Consultation::find($consultationId);

        $minutes = $consultation->type->minutes;

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

        array_pop($array_of_time);

        foreach($array_of_time as  $started_at) {
            Appointment::updateOrCreate([
                'consultation_id' => $consultation->id,
                'start_at' => Carbon::parse($started_at)->format('H:i'),
                'end_at' => Carbon::parse($started_at)->addMinutes($minutes)->format('H:i')
            ]);
        }
    }

    public function getActiveConsultations()
    {
        return Consultation::query()
            ->active()
            ->orderByDesc('day')
            ->get();
    }

    public function resetConsultationFields()
    {
        return [
            'user_id' => '',
            'office_id' => '',
            'day' => '',
            'open' => '',
            'close' => '',
			'is_digital' => 0,
			'type_id' => ''
        ];
    }
}
