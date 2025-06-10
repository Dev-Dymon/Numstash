@extends('layouts.webapp')
@section('content')
    <!-- Session Status -->
    
    <div class=" w-full h-[90vh] flex justify-center items-center flex-col">
    <h1 class="text-3xl font-[700] mb-4 text-[#6f42c1] text-center">Forgot Password</h1>
        <form method="POST" action="{{ route('password.email') }}"
            class="sm:w-[500px] w-[90%] border-[2px] border-[#6f42c1] p-10 rounded-lg">
            @csrf

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
