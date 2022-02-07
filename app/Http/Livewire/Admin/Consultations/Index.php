<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Http\Traits\AppointmentTrait;
use App\Http\Traits\ConsultationTrait;
use App\Models\Office;
use App\Models\Consultation;
use App\Models\Type;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    use ConsultationTrait; use AppointmentTrait;

    public $columns = ['Orvos', 'Helye', 'Napja', 'Kezdés', 'Vége'];
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
        $this->consultations = Consultation::query()
            ->orderByDesc('day')
            ->get();

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

        $data = $consultation->appointments;
        $columns = ['Rendelés', 'Vizsgálat típusa',  'Vizsgálat kezdete', 'Vizsgálat vége','Páciens neve', 'Taj-száma', 'Telefonszám','Kontroll vizsgálat'];


        $fileName = \Str::slug($consultation->name) . '.csv';

        $headers = array(
            "Content-type"        => "text/csv; charset=utf-8",
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
                $row['phone'] = $item->applicant->phone;
                $row['control']  = $this->checkControlExamination($item->id, $item->applicant->id);

                fputcsv($file, array($row['consultation'], $row['medicalExamination'], $row['start'], $row['end'], $row['applicant_name'], $row['social_security_number'], $row['phone'], $row['control']));
            }

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
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
