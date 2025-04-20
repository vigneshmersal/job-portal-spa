<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Livewire\Forms\JobPostingForm;
use Livewire\WithFileUploads;
use App\Models\Skill;
use Livewire\Attributes\Computed;

class Create extends Component
{
    use WithFileUploads;
    
    public JobPostingForm $form;
    
    public function save() {
        $this->form->store();

        $this->redirectRoute('admin.jobs.index', navigate: true);
    }
    
    #[Computed]
    public function skills()
    {
        return Skill::get();
    }
    
    public function render()
    {
        return view('livewire.pages.jobs.create');
    }
}
