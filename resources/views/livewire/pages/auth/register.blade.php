<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    use WithFileUploads;

public $name = '';
public $email = '';
public $password = '';
public $password_confirmation = '';
public $number = '';
public $membership_fee;

// Handle the registration logic
public function register()
{
    // Validation rules
    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'unique:users,email'],
        'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        'number' => ['required', 'string', 'max:15'],
        // Accept image only
    ]);

    // Hash the password
    $validated['password'] = Hash::make($validated['password']);

    // Handle the image file upload


    // Create user
    event(new Registered($user = User::create($validated)));

    // Login the user after registration
    Auth::login($user);

    // Redirect after successful registration
    $this->redirect(RouteServiceProvider::HOME, navigate: true);
}

};
?>


<div>
    <form wire:submit.prevent="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" type="text" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" type="email" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Number -->
        <div class="mt-4">
            <x-input-label for="number" :value="__('Number')" />
            <x-text-input wire:model="number" id="number" type="text" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" type="password" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>

