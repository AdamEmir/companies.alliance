@props(['isMerge' => true])
@php
    $formName = $attributes->whereStartsWith('wire:model')->first() ?? $attributes->get('name');
@endphp
<div @class(['input-group', 'input-group-merge' => $isMerge])>
    <input
        type="text"
        {{ $attributes->class(['form-control', 'bootstrap-datepicker', 'invalid is-invalid' => $errors->has($formName)]) }}
        {{ $attributes }}
        autocomplete="off"
        data-date-format="dd/mm/yyyy"
        data-date-clear-btn="true"
    >
    <span class="input-group-text"><i class="ti ti-calendar"></i></span>
</div>
@error($formName)
<x-form.error>
    {{ $message }}
</x-form.error>
@enderror

@pushOnce('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
@endPushOnce

@pushOnce('scripts')
<script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
@endPushOnce

@push('additional-scripts')
<script>
    // $('#{{ $attributes->get('id') }}').datepicker();
    $('.bootstrap-datepicker').datepicker();
</script>
@endpush
