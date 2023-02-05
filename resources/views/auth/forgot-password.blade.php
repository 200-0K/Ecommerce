<x-app-layout class="flex flex-col items-center justify-center w-full">
  {{-- <div>
        <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div> --}}
  <div class="w-full sm:max-w-md my-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
    <div class="mb-4 text-sm text-gray-600 text-center">
      {{ __('auth.request_rest_password_link') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('validation.attributes.email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-primary-button>
          {{ __('validation.confirm') }}
        </x-primary-button>
      </div>
    </form>
  </div>
</x-app-layout>