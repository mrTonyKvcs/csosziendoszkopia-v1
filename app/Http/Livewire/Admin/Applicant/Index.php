<?php

namespace App\Http\Livewire\Admin\Applicant;

use App\Models\Applicant;
use Livewire\Component;

class Index extends Component
{
    public $applicants = [];
    public $columns = ['Név', 'Email', 'Telefonszám', 'Taj-szám'];

    public function mount()
    {
        $this->applicants = Applicant::all();
    }

    public function render()
    {
        return view('livewire.admin.applicant.index')
            ->layout('components.layouts.admin');
    }

    public function delete($id)
    {
        collect($this->applicants)
            ->firstWhere('id', $id)
            ->delete();

        $this->applicants = [];
        $this->applicants = Applicant::all();

        session()->flash('success', 'Sikeresen törölte a pácienst!');
    }
}
