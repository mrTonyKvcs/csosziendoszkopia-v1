<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Exports\ConsultationExport;
use App\Http\Traits\AppointmentTrait;
use App\Http\Traits\ConsultationTrait;
use App\Models\Office;
use App\Models\Consultation;
use App\Models\Type;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use ConsultationTrait; use AppointmentTrait;

    public $columns = ['Napja', 'Kezdés', 'Vége'];
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
        $this->consultations = $this->getActiveConsultations();

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
        $this->consultations = [];
        $this->consultations = $this->getActiveConsultations();
        $this->newConsultation = [];
        $this->newConsultation = $this->resetConsultationFields();

        session()->flash('success', 'Az új rendelési napot sikeren felvette!');
    }

    public function export($consultationId)
    {
        // $this->exportToday($this->consultation, $this->columns, $this->appointments);
        $consultation = Consultation::find($consultationId);

        $data = $consultation->appointments()->orderBy('start_at')->get();

        return Excel::download(new ConsultationExport($data), \Str::slug($consultation->name) . '.xlsx');
    }

    public function confirmDeletion($id) 
    {
        $this->confirmingItemDeletion = $id;
    }

    public function delete(Consultation $consultation)
    {
        $consultation->delete();

        $this->consultations = [];
        $this->confirmingItemDeletion = false;
        $this->consultations = $this->getActiveConsultations();

        session()->flash('success', 'Az rendelési napot sikeresen törölte!');
    }
}
