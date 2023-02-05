<x-app-layout class="flex flex-col items-center justify-center w-full">
  {{-- <div>
        <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div> --}}
  <div class="w-full sm:max-w-md my-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
    <div class="mb-4 text-sm text-gray-600 text-center">
      {{ __('auth.require_confirm_password') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf

      <!-- Password -->
      <div>
        <x-input-label for="password" :value="__('validation.attributes.password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <div class="flex justify-end mt-4">
        <x-primary-button>
          {{ __('validation.confirm') }}
        </x-primary-button>
      </div>
    </form>
  </div>
</x-app-layout>
