<x-app-layout class="flex flex-col items-center justify-center w-full">
  {{-- <div>
        <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div> --}}
  <div class="w-full sm:max-w-md my-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div>
        <x-input-label for="name" :value="__('validation.attributes.name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-input-label for="email" :value="__('validation.attributes.email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('validation.attributes.password')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('validation.attributes.password_confirmation')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <div class="flex flex-col my-4 justify-center items-center">
        <x-primary-button>
          {{ __('auth.signup') }}
        </x-primary-button>
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
          {{ __('auth.already_registered') }}
        </a>
      </div>
    </form>
  </div>
</x-app-layout>
