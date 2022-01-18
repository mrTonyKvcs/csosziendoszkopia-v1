<?php

namespace App\Http\Traits;

use App\Models\Consultation;

trait ConsultationTrait
{
    public function createNewConsultation()
    {
        Consultation::updateOrCreate(
        [
			'type_id' => $this->newConsultation['type_id'],
            'user_id' => $this->newConsultation['user_id'],
            'office_id' => $this->newConsultation['office_id'],
            'day' => $this->newConsultation['day'],
            'is_digital' => $this->newConsultation['is_digital']
        ],
        [
            'open' => $this->newConsultation['open'],
            'close' => $this->newConsultation['close'],
        ]);
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
