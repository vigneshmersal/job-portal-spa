<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skill;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;
    
    public ?Skill $skill;
    
    #[Locked]
    public int $id;
    
    #[Validate('required|string|min:2|max:255|unique:skills')]
    public string $name;
    
    public bool $isEditing = false;
    
    public function store()
    {
        $this->validate();

        Skill::create(['name' => $this->name]);

        $this->reset();
        
        session()->flash('status', 'Skill added successfully.');
    }
    
    public function update()
    {
        $this->validate();

        $this->skill->update(['name' => $this->name]);

        $this->reset();
        
        session()->flash('status', 'Skill updated successfully.');
    }

    public function edit(Skill $skill)
    {
        $this->id = $skill->id;
        $this->name = $skill->name;
        $this->isEditing = true;
        $this->skill = $skill;
    }

    public function delete(Skill $skill)
    {
        $skill->delete();
        
        $this->reset();
        
        session()->flash('status', 'Skill deleted successfully.');
    }
    
    #[Computed]
    public function skills()
    {
        return Skill::paginate(10);
    }
    
    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
