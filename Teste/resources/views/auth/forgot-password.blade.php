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

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}" class="bg-yellow-100 rounded-lg p-6">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4 bg-yellow-500 hover:bg-yellow-600 rounded-md">
                    {{ __('Link de redefinição de senha de e-mail') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>