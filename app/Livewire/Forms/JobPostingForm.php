<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Locked;
use App\Models\JobPosting;

class JobPostingForm extends Form
{
    public ?JobPosting $jobPosting;
    
    #[Locked]
    public ?int $id;
    
    public string|null $title, $description, $location, $extra, $company_name, $experience, $salary;
    public array $selectedSkills = [];
    public $logo;
    public $company_logo = '';
    
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
            'extra' => 'nullable|string',
            'company_name' => 'required|string',
            'logo' => 'nullable|image',
            'selectedSkills' => 'required|array'
        ];
    }

    public function store()
    {
        $this->validate();
        
        if ($this->logo) {
            $this->company_logo = $this->logo->storePublicly('logos', ['disk' => 'public']);
        }

        $job = JobPosting::create($this->only([
            'title', 'description', 'experience', 'salary', 'location',
            'extra', 'company_name', 'company_logo',
        ]));
        $job->skills()->sync($this->selectedSkills);

        session()->flash('message', 'Job post created successfully.');
        
        $this->reset();
    }
}
