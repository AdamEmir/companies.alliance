@php
    $formName = $attributes->whereStartsWith('wire:model')->first() ?? $attributes->get('name');
@endphp
<select
    {{ $attributes->class(['form-control', 'invalid is-invalid' => $errors->has($formName)]) }}
    {{ $attributes }}
>
    {{ $slot }}
</select>
@error($formName)
<x-form.error>
    {{ $message }}
</x-form.error>
@enderror
