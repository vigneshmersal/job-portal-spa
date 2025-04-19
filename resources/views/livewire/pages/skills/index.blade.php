<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
        
        <div wire:offline wire:transition class="flex container mt-4 text-center">
            <p class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                You are offline. Please check your internet connection.
            </p>
        </div>

        @if (session()->has('status'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 3000)" 
                x-show="show"
                x-transition 
                class="bg-green-100 text-green-800 px-4 py-2 rounded mt-4 mb-4"
            >
                {{ session('status') }}
            </div>
        @endif
        
        <div class="flex gap-8">
            <div class="w-2/3 bg-white rounded-xl shadow p-6">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-2 px-4">NAME</th>
                            <th class="py-2 px-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($this->skills as $skill)
                        <tr class="border-b">
                            <td class="p-4 font-medium">{{ $skill->name }}</td>
                            <td class="p-4 flex justify-end">
                                <button wire:click="edit({{ $skill->id }})" class="text-blue-500">Edit</button>
                                <button wire:click="delete({{ $skill->id }})" class="text-red-500 ml-4">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{$this->skills->links()}}
                </div>
            </div>

            <div class="w-1/3 bg-white">
                <div class="rounded-xl shadow p-6">
                    <h2 class="text-xl font-bold mb-4">
                        {{ $isEditing ? 'Edit Skill' : 'Add new skill' }}
                    </h2>
                    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                        <div class="mb-4">
                            <label class="block font-semibold">Name</label>
                            <input type="text" wire:model="name" class="w-full border rounded p-2 mt-1" placeholder="Skill name">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            <div wire:loading
                                class="animate-spin inline-block size-6 border-3 border-current border-t-transparent text-white border-b rounded-full dark:text-white"
                                role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                            {{ $isEditing ? 'Update' : 'Save' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
