<x-app-layout class="flex-1 flex flex-col items-center justify-center w-full">
  {{-- <div>
        <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div> --}}
  <div class="w-full sm:max-w-md my-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('validation.attributes.email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('validation.attributes.password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <!-- Remember Me -->
      <div class="block mt-4">
        <label for="remember_me" class="inline-flex gap-1 items-center">
          <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
          <span class="ml-2 text-sm text-gray-600">{{ __('auth.remember_me') }}</span>
        </label>
      </div>
      <div class="flex flex-col my-4 justify-center items-center">
        <x-primary-button>
          {{ __('auth.signin') }}
        </x-primary-button>
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
          {{ __('auth.signup') }}
        </a>
      </div>
      <div dir="ltr" class="flex gap-4 items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
          {{ __('auth.forget_password') }}
        </a>
        @endif
      </div>
    </form>
  </div>
</x-app-layout>
