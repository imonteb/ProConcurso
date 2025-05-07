<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6 border border-blue-400 rounded-lg bg-blue-600 p-6 shadow-md dark:bg-blue-800 dark:border-blue-700">
    <!-- Logo -->
    <div class=" items-center justify-center mb-4 bg-blue-950 dark:bg-blue-950 text-yellow-400 rounded-sm hover:bg-gray-100 md:hover:bg-gray-700 
    md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
        <div class="pt-2 ps-2">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('img/imblogoCode.png') }}" class="h-16" alt="ImbCode Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-400">Pro<span class="text-red-500">Concurso</span>
            </a>
        </div>
        <div class="pb-2 items-center text-center justify-center ">
            <a href="/" class=" items-center space-x-3 rtl:space-x-reverse text-center">
                <span class="self-center  text-2xl font-semibold whitespace-nowrap text-yellow-400">Voltar ao Inicio</span>
            </a>
        </div>
    </div>

    <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6 text-yellow-400 dark:text-yellow-400">
        <!-- Email Address -->
        <flux:input
            class="text-yellow-400"
            wire:model="email"          
            :label="__('Email ')" 
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"/>

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                viewable
                autocomplete="current-password"
                :placeholder="__('Password')" />

            @if (Route::has('password.request'))
            <flux:link class="absolute  end-0 top-0 text-sm text-yellow-400" :href="route('password.request')" wire:navigate>
                {{ __('Forgot your password?') }}
            </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Remember me')"/>

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full  bg-blue-950 dark:bg-blue-950 text-yellow-400">{{ __('Log in') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-yellow-400 dark:text-zinc-400">
        {{ __('Don\'t have an account?') }}
        <flux:link :href="route('register')" class="text-yellow-400" wire:navigate>{{ __('Sign up') }}</flux:link>
    </div>
    @endif
</div>