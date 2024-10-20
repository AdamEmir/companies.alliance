
@php
    $formName = $attributes->whereStartsWith('wire:model')->first() ?? $attributes->filter(fn($value, $key) => $key == 'name')->first() ?? '';
@endphp
<input
    {{ $attributes
    ->class(['form-control', 'invalid is-invalid' => $errors->has($formName)])
    ->merge(['type' => 'text']) }}
    {{ $attributes }}
    value="{{ old($formName, $attributes->filter(fn($value, $key) => $key == 'value')->first() ) }}"
>
@error($formName)
<x-form.error>
    {{ $message }}
</x-form.error>
@enderror
