@props(['type'])

@if ($type == 'success')
<div class="bg-green-100 text-green-700 p-3" >
    {{ $slot }}
</div>
@endif

@if ($type == 'error')
<div class="bg-red-100 text-red-700 p-3" >
    {{ $slot }}
    there is an error
</div>
@endif
