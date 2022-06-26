<?php

namespace App\Http\Traits;
use App\Models\Applicant;
use App\Models\Appointment;
use App\Models\Consultation;
use Carbon\Carbon;

trait AppointmentTrait {
    public function createApplicant()
    {
        return Applicant::updateOrCreate([
            'social_security_number' => $this->socialSecurityNumber,
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
        $consultationId = is_object($this->consultation) ? $this->consultation->id : $this->consultation;

        $appointment = Appointment::query()
            ->where('consultation_id', $consultationId)
            ->where('start_at', $this->appointment['start_at'])
            ->where('end_at', $this->appointment['end_at'])
            ->first();

        $appointment->update([
            'medical_examination_id' => $this->medicalExaminationId,
            'applicant_id' => $applicantId,
        ]);

        return $appointment;
    }

    public function exportToday($consultation, $columns, $data)
    {
        $fileName = \Str::slug($consultation->name) . '.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $callback = function() use($data, $columns, $consultation) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $item) {
                $row['consultation']  = $consultation->name;
                $row['medicalExamination']    = $item->medicalExamination->name;
                $row['start']    = $item->start_at;
                $row['end']  = $item->end_at;
                $row['applicant_name']  = $item->applicant->name;
                $row['social_security_number']  = $item->applicant->social_security_number;
                $row['control']  = 'Nem';

                fputcsv($file, array($row['consultation'], $row['medicalExamination'], $row['start'], $row['end'], $row['applicant_name'], $row['social_security_number'], $row['control']));
            }

            fclose($file);
        };

        return response()->stream(mb_convert_encoding($callback, 'UTF-16LE', 'UTF-8'), 200, $headers);
    }

    public function deleteAppointment($id)
    {
        Appointment::find($id)
            ->delete();

        $this->appointments->forget($id);

        session()->flash('success', 'Az időpontot sikeren törölte!');
    }

    public function checkControlExamination($appointmentId, $applicantId)
    {
        $appointmentDay = Carbon::parse(Appointment::find($appointmentId)->consultation->day)->subMonths(3)->format('Y-m-d');

        $appointments = Appointment::whereNotIn('id', [$appointmentId])
            ->where('applicant_id', $applicantId)
            ->whereHas('consultation', function($q) use ($appointmentDay) {
                $q
                    ->where('day', '>=', $appointmentDay)
                    ->orderBy('day');
            })
            ->get();

        return $appointments->isEmpty()
            ? 'Nem'
            : $appointments->first()->consultation->day . ': ' . $appointments->first()->start_at . ' | '.  $appointments->first()->medicalExamination?->name;
    }
}
