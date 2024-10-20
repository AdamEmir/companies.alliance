@php
    $formName = $attributes->whereStartsWith('wire:model')->first() ?? $attributes->filter(fn($value, $key) => $key == 'name')->first() ?? '';
@endphp

<input
    {{ $attributes
    ->class(['form-control', 'is-invalid' => $errors->has($formName)])
    ->merge(['type' => 'file']) }} 
>

@error($formName)
    <x-form.error>
        {{ $message }}
    </x-form.error>
@enderror
