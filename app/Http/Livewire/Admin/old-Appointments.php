<?php

namespace App\Http\Livewire\Admin;

use App\Models\Appointment as AppointmentModel;
use Livewire\Component;

class Appointments extends Component
{
    protected $appointments;
    protected $columns = ['Vizsgálat napja', 'Ideje', 'Vizsgálat neve', 'Beteg neve'];
    protected $todayData = true;

    protected $listeners = ['switchTodayData' => 'switchTodayData'];

    public function mount()
    {
        $this->appointments = $this->getTodayAppointments();
    }

    public function render()
    {
        return view('livewire.admin.appointments', [
            'appointments' => $this->appointments,
            'columns' => $this->columns,
            'todayData' => $this->todayData
        ])
        ->layout('components.layouts.admin');
    }

    public function switchTodayData()
    {
        $this->todayData = $this->todayData ? false : true;
        $this->appointments =  null;

        if ($this->todayData) {
            return $this->appointments = $this->getTodayAppointments();
        }

        return $this->appointments = $this->getAllAppointments();
    }

    protected function getTodayAppointments()
    {
        return AppointmentModel::whereHas('consultation', function($q) {
            $q->where('day', now()->format('Y-m-d'));
        })->get();
    }

    protected function getAllAppointments()
    {
        return AppointmentModel::paginate(10);
        // return Appointment::paginate(10)->sortBy( function ($q) {
        //     return $q->consultation->day;
        // })->all();
    }
}
