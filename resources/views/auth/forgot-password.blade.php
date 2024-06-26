<x-guest-layout>
    <x-jet.authentication-card>
        <x-slot name="logo">
            <x-assets.logo.cxlogo :icon="'light'" class="h-20 ml-4 mx-auto w-auto  block"/>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <x-jet.validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet.label for="email" value="{{ __('Email') }}"/>
                <x-jet.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus autocomplete="username"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet.button>
                    {{ __('Email Password Reset Link') }}
                </x-jet.button>
            </div>
        </form>
    </x-jet.authentication-card>
</x-guest-layout>
