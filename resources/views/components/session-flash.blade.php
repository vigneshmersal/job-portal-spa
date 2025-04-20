@props([
	'field' => 'message',
])

@if (session()->has($field))
	<div 
		x-data="{ show: true }" 
		x-init="setTimeout(() => show = false, 3000)" 
		x-show="show"
		x-transition 
		class="bg-green-100 text-green-800 px-4 py-2 rounded mt-4 mb-4"
	>
		{{ session($field) }}
	</div>
@endif
