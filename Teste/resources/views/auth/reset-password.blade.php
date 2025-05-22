<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="mb-6 flex justify-center">
                <img src="{{ asset('imagens/JMWS_logo.png') }}" alt="Foto do Aluno"
                    class="w-20 h-20 rounded-full border-4 border-gray-300">
            </div>
            {{--
            <x-authentication-card-logo /> --}}
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}" class="bg-yellow-100 rounded-lg p-6">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4 bg-yellow-500 hover:bg-yellow-600 rounded-md">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>