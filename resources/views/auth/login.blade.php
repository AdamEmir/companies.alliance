<x-layout>
    <card style="margin-left: 25%; margin-right: 25%;margin-top: 15%" class="card card-custom">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-form.label>@lang('Email')</x-form.label>
                    <x-form.input type="email" name="email" required required autofocus autocomplete="username" />
                    <x-form.error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-form.label>@lang('Password')</x-form.label>

                    <x-form.input id="password" class="block mt-1 w-full"
                                  type="password" name="password" required />

                    <x-form.error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-5">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                        <button class="btn btn-primary btn-block">
                            {{ __('Log in') }}
                        </button>
                </div>
            </form>
        </div>
    </card>
</x-layout>
