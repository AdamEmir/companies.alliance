@props(['for'])
@error($for)
<div class="text-danger form-text">
    {{ $message }}
</div>
@enderror
