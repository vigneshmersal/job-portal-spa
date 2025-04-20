@props([
	'label',
	'disabled' => false,
	'multiple' => false,
	'notes' => null,
])

<div>
	@if ($label)
		<x-label>{{ $label }}</x-label>
	@endif
	<input type="file"
		{{ $disabled ? 'disabled' : '' }}
		{{ $multiple ? 'multiple' : '' }}
		{!! $attributes->merge(['class' => 'block w-full text-grey-500 file:py-2 file:px-6 file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:cursor-pointer hover:file:bg-blue-100 hover:file:text-blue-700 mt-1 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:file:bg-gray-800 dark:file:text-white dark:file:hover:text-gray-200 dark:file:hover:bg-gray-600',]) !!} >
	@if ($notes)
		<x-notes>{{ $notes }}</x-notes>
	@endif
	<x-error :for="$attributes->get('wire:model')" />
</div>
