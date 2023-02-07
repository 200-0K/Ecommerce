<x-app-layout class="flex items-center justify-center">
  <div class="hero my-14">
    <div class="hero-content text-center">
      <div class="max-w-md">
        <h1 class="text-5xl font-bold" dir="auto">{{ __('app.welcome') }}</h1>
        <p class="py-6" dir="auto">{{ __('app.summary') }}</p>
        <a href="{{route('explore')}}" class="btn btn-primary" dir="auto">{{ __('app.explore') }}</a>
      </div>
    </div>
  </div>
</x-app-layout>