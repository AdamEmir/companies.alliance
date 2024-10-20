<div>
    <x-card title="Company Information" class="mt-5">
        <div class="card-body">
            <div class="form-group row">
                <div class="col text-center">
                    <br>
                    <x-card-data-read><div class="text-center p-3">
                            <img src="{{ Storage::url($company->logo) ?? '-' }}"
                                 class="img-fluid rounded shadow"
                                 style="border: 1px solid #ddd; padding: 5px;"
                                 width="250" height="250"
                                 alt="Company Logo">
                        </div></x-card-data-read>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <span class="text-dark-50">@lang('Name')</span>
                    <br>
                    <x-card-data-read>{{ ucwords($company->name) }}</x-card-data-read>
                </div>
                <div class="col">
                    <span class="text-dark-50">@lang('Email')</span>
                    <br>
                    <x-card-data-read>{{ strtolower($company->email)}}</x-card-data-read>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <span class="text-dark-50">@lang('Website')</span>
                    <br>
                    <a href="{{$company->website_url}}">{{ strtolower($company->website_url) }}</a>
                </div>
            </div>
        </div>
    </x-card>

    <x-card title="Created By" class="mt-5">
        <div class="card-body">
            <div class="form-group row">
                <div class="col">
                    <span class="text-dark-50">@lang('Name')</span>
                    <br>
                    <x-card-data-read>{{ucwords($user->name)}}</x-card-data-read>
                </div>
                <div class="col">
                    <span class="text-dark-50">@lang('Email')</span>
                    <br>
                    <x-card-data-read>{{strtolower($user->email)}}</x-card-data-read>
                </div>
            </div>
        </div>
    </x-card>

    <div class="card mt-5">
        <div class="card-body text-end">
            <a type="button" class="btn btn-secondary font-weight-bold" href="{{route('companies.index')}}">@lang('Back')</a>
        </div>
    </div>
</div>
