<x-app-layout class="flex flex-col items-center justify-center w-full">
  {{-- <div>
        <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div> --}}
  <div class="w-full sm:max-w-md my-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
    <form method="POST" action="{{ route('password.store') }}">
      @csrf

      <!-- Password Reset Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('validation.attributes.email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('validation.attributes.password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('validation.attributes.password_confirmation')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-primary-button>
          {{ __('auth.reset_password') }}
        </x-primary-button>
      </div>
    </form>
  </div>
</x-app-layout>
