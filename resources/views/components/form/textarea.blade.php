@props(['value' => ''])
@php
    $formName = $attributes->whereStartsWith('wire:model')->first() ?? $attributes->filter(fn($value, $key) => $key == 'name')->first() ?? '';
@endphp

@if (filled($formName))
<textarea
    rows="5"
    {{ $attributes->class(['form-control', 'invalid is-invalid' => $errors->has($formName)]) }}
    {{ $attributes }}
>{{ old($formName, $value) }}</textarea>
@else
<textarea
    rows="5"
    {{ $attributes->class(['form-control', 'invalid is-invalid' => $errors->has($formName)]) }}
    {{ $attributes }}
></textarea>
@endif

@error($formName)
<x-form.error>
    {{ $message }}
</x-form.error>
@enderror
