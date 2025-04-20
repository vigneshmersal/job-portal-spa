<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobPosting;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{

    #[Computed]
    public function jobs()
    {
        return JobPosting::get();
    }
    
    public function delete(JobPosting $jobPosting)
    {
        $jobPosting->delete();
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
