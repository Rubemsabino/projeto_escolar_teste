<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="mb-6 flex justify-center">
                <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno"
                    class="w-20 h-20 rounded-full border-4 border-gray-300">
            </div>
            {{--
            <x-authentication-card-logo /> --}}
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="bg-yellow-100 rounded-lg p-6">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-blue-500" />
                <x-input id="email" class="block mt-1 w-full rounded-md" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full rounded-md" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('auth.forgot_password') }}
                </a>
                @endif

                <x-button class="ms-4 bg-yellow-500 hover:bg-yellow-600 rounded-md">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>