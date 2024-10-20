<div class="card card-custom mt-5">
    <div class="card-header">
        <div class="card-title">
            <h3>Update Company</h3>
        </div>
    </div>
    <form x-data="editCompany" @submit.prevent="formSubmit">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <x-form.label :required="true">@lang('Name')</x-form.label>
                    <x-form.input type="text" class="form-control" wire:model="name" />
                </div>
                <div class="col-6">
                    <x-form.label>@lang('Email')</x-form.label>
                    <x-form.input wire:model="email" />
                </div>
            </div>
            <div class="row">
                <div class="col-6 mt-3">
                    <x-form.label>@lang('Logo')</x-form.label>
                    <x-form.file wire:model="logo"/>
                    @if ($company->logo)
                        <img src="{{ Storage::url($company->logo) }}" alt="Company Logo" width="150" height="150" class="rounded">
                    @else
                        <p>No logo uploaded.</p>
                    @endif
                </div>
                <div class="col-6 mt-3">
                    <x-form.label>@lang('Website Url')</x-form.label>
                    <x-form.input wire:model="websiteUrl" />
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a type="button" class="btn btn-secondary font-weight-bold" href="{{route('companies.index')}}">@lang('Back')</a>
            <a class="btn btn-primary" type="button" x-on:click="formSubmit">
                <i class="fas fa-save"></i>@lang('Save')
            </a>

        </div>
    </form>
</div>

@script
<script>
    Alpine.data('editCompany', () => ({
        formSubmit() {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then(async (response) => {
                if (response.isConfirmed) {
                    await $wire.update();
                }
            });
        }
    }));

    $wire.on('saved', (e) => {
        Swal.fire({
            title: 'Success!',
            icon: 'success',
            text: 'Company has been updated!',
            confirmButtonText: 'Ok',
        }).then(() => {
            window.location.href = '{{ route('companies.index') }}';
        });
    });

    $wire.on('error', (e) => {
        Swal.fire({
            title: 'Error!',
            icon: 'error',
            text: error,
            confirmButtonText: 'Ok',
        });
    });
</script>
@endscript
