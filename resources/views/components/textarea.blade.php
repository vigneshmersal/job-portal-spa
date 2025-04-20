@props([
	'label',
	'rows' => 2,
	'disabled' => false,
	'notes' => null,
])

<div>
    @if ($label)
        <x-label>{{ $label }}</x-label>
    @endif
    <textarea rows="{{ $rows }}"
		{{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300']) !!}></textarea>
	@if ($notes)
		<x-notes>{{ $notes }}</x-notes>
	@endif
    <x-error :for="$attributes->get('wire:model')" />
</div>
