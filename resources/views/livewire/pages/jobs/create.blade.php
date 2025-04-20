<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>
        
        <x-offline />

        <x-session-flash />
        
        <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4 rounded-xl shadow p-4">
                <h2 class="font-semibold">Job details</h2>
                <x-input label="Title" wire:model="form.title" placeholder="Job posting title" />
                <x-textarea label="Description" wire:model="form.description" placeholder="Job posting description" />
                <div class="grid grid-cols-2 gap-4">
                    <x-input label="Experience" wire:model="form.experience" placeholder="Eg. 1–3 Yrs" />
                    <x-input label="Salary" wire:model="form.salary" placeholder="Eg. 2.75–5 Lacs PA" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <x-input label="Location" wire:model="form.location" placeholder="Eg. Remote / Pune" />
                    <x-input label="Extra Info" wire:model="form.extra" placeholder="Eg. Full Time, Urgent / Part Time, Flexible" notes="Please use comma seperated values" />
                </div>
            </div>
        
            <div class="space-y-4">
                <div class="space-y-4 rounded-xl shadow p-4">
                    <h2 class="font-semibold">Company details</h2>
                    <x-input label="Name" wire:model="form.company_name" placeholder="Company Name" />
                    <x-file label="Logo" wire:model="form.logo" />
                </div>
                
                <div class="space-y-4 rounded-xl shadow p-4">
                    <h2 class="font-semibold">Skills</h2>
                    <x-select label="Name" wire:model="form.selectedSkills" multiple>
                        <option value="">Select Skill</option>
                        @foreach ($this->skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
        
            <div class="col-span-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
        
    </div>
</div>
