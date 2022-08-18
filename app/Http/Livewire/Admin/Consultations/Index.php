<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Exports\ConsultationExport;
use App\Http\Traits\AppointmentTrait;
use App\Http\Traits\ConsultationTrait;
use App\Models\Appointment;
use App\Models\Office;
use App\Models\Consultation;
use App\Models\Type;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use ConsultationTrait;
    use AppointmentTrait;

    public $columns = ['Napja'];
    public $consultations = [];
    public $createForm = false;
    public $confirmingItemDeletion = false;
    public $doctors;
    public $offices;
    public $data = [];
    public $type = [];
    public $newConsultation = [
        'user_id' => '',
        'office_id' => '',
        'day' => '',
        'open' => '',
        'close' => '',
        'is_digital' => 0,
        'type_id' => ''
    ];
    public $doctorGroup;

    protected $rules = [
        'newConsultation.user_id' => 'required',
        'newConsultation.office_id' => 'required',
        'newConsultation.day' => 'required',
        'newConsultation.open' => 'required',
        'newConsultation.close' => 'required',
        'newConsultation.type_id' => 'required',
    ];

    public function mount()
    {
        $this->doctorGroup = $this->getActiveConsultations()
            ->groupBy(['user_id', 'day']);

        // $this->consultations = $this->getActiveConsultations()
        //     ->groupBy(['user_id', 'day']);


        $this->data['doctors'] = User::query()
            ->doctors()
            ->get();

        $this->data['offices'] = Office::all();

        $this->data['types'] = Type::all();
    }

    public function render()
    {
        return view('livewire.admin.consultations.index')
            ->layout('components.layouts.admin');
    }

    public function create()
    {
        $this->validate();

        $this->createNewConsultation();

        $this->createForm = false;
        $this->doctorGroup = [];
        $this->doctorGroup = $this->getActiveConsultations()
            ->groupBy(['user_id', 'day']);
        $this->newConsultation = [];
        $this->newConsultation = $this->resetConsultationFields();

        session()->flash('success', 'Az új rendelési napot sikeren felvette!');
    }

    public function export($doctor, $consultation)
    {
        dd($doctor, $consultation);
        // $data = Appointment::whereHas('consultation', function ($q) use ($consultation, $doctor) {
        //     $q->where('day', $consultation)
        //         ->whereHas('user', function ($q) use ($doctor) {
        //             $q->where('id', $doctor);
        //         });
        // })->get();

        // return Excel::download(new ConsultationExport($data), \Str::slug($consultation) . '.xlsx');
    }

    public function confirmDeletion($id)
    {
        $this->confirmingItemDeletion = $id;
    }

    public function delete(Consultation $consultation)
    {
        $consultation->delete();

        $this->confirmingItemDeletion = false;
        $this->doctorGroup = [];
        $this->doctorGroup = $this->getActiveConsultations()
            ->groupBy(['user_id', 'day']);

        session()->flash('success', 'Az rendelési napot sikeresen törölte!');
    }

    public function getDoctorName($id)
    {
        return User::find($id)
            ->name;
    }
}
