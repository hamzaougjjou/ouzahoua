@extends('layouts.app')

@section('title', $store->name . ' تسجيل الدخول ')

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}"
    class="w-full max-w-md p-4 rounded-md bg-white mx-auto my-5 rtl"
    >
        @csrf

        <!-- Email Address -->
        <div>
            <label for="login" >البريد الالكتروني :</label>
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" >
                كلمة المرور : 
            </label>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type='submit' class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md 
            font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
             focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 
             focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-3'>
                تسجيل الدخول
            </button>
        </div>
    </form>
@endsection
