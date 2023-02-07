<nav x-data="{ open: false }" dir="ltr" class="navbar bg-base-200 py-3 px-4">
  @php
  $currency = 'SAR';
  $user = Auth::user();
  $cart = $user?->cart;
  $cartCount = $cart?->count();
  @endphp
  <div class="flex-1">
    <a href="/" class="btn btn-ghost normal-case text-xl">{{ config('app.name') }}</a>
  </div>
  <div class="flex-none">
    {{-- Navigation Links --}}
    <div class="border-r-2 mr-2">
      <a href="{{ route('explore') }}" class="btn btn-ghost normal-case">{{ __('app.explore') }}</a>
    </div>

    <div title="Change Language" class="dropdown dropdown-end">
      <div tabindex="0" class="btn btn-ghost gap-1 normal-case"><svg class="inline-block h-4 w-4 fill-current md:h-5 md:w-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
          <path d="M363,176,246,464h47.24l24.49-58h90.54l24.49,58H480ZM336.31,362,363,279.85,389.69,362Z"></path>
          <path d="M272,320c-.25-.19-20.59-15.77-45.42-42.67,39.58-53.64,62-114.61,71.15-143.33H352V90H214V48H170V90H32v44H251.25c-9.52,26.95-27.05,69.5-53.79,108.36-32.68-43.44-47.14-75.88-47.33-76.22L143,152l-38,22,6.87,13.86c.89,1.56,17.19,37.9,54.71,86.57.92,1.21,1.85,2.39,2.78,3.57-49.72,56.86-89.15,79.09-89.66,79.47L64,368l23,36,19.3-11.47c2.2-1.67,41.33-24,92-80.78,24.52,26.28,43.22,40.83,44.3,41.67L255,362Z">
          </path>
        </svg> <svg width="12px" height="12px" class="ml-1 hidden h-3 w-3 fill-current opacity-60 sm:inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
          <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
        </svg></div>
      <div class="dropdown-content bg-base-200 text-base-content rounded-t-box rounded-b-box top-px mt-16 w-56 overflow-y-auto shadow-2xl">
        <ul class="menu menu-compact gap-1 p-3" tabindex="0">
          @foreach([
            'ar' => [
              'lang' => 'العربية',
              'img' => 'https://flagpack.xyz/_nuxt/504692f0f09c3fe396344ee04ac8ace9.svg'
            ], 
            'en' => [
              'lang' => 'English',
              'img' => 'https://flagpack.xyz/_nuxt/4c829b6c0131de7162790d2f897a90fd.svg'
            ]
          ] as $locale => $item)
          <li>
            <a href="{{ route('locale.update', $locale) }}" @class(['flex', 'active' => app()->getLocale() === $locale])>
              <img loading="lazy" width="20" height="20" alt="{{ $item['lang'] }}" src="{{ $item['img'] }}">
              <span class="flex flex-1 justify-between">{{ $item['lang'] }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    {{-- Cart --}}
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <a {{ !Auth::check() ? 'href='.route('login').'' : '' }}>
            <svg width="24px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
          </a>
          @auth
          @if($cartCount > 0)
          <span class="badge badge-sm indicator-item">{{ $cartCount }}</span>
          @endif
          @endauth
        </div>
      </label>
      @auth
      <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-200 shadow">
        <div class="card-body">
          @if($cartCount > 0)
          <span class="font-bold text-lg" dir="auto">{{ $cartCount }} {{ trans_choice('app.product', $cartCount) }}</span>
          <span class="text-info" dir="auto">{{ __('app.subtotal') }}: {{ $cart->sum(fn ($product) => ($product->new_price ?? $product->price) * $product->pivot->qty ) ?? '' }} <span class="text-xs">{{ $currency }}</span></span>
          @endif
          <div class="card-actions">
            <a href="{{route('checkout')}}" class="btn btn-primary btn-block">{{ __('app.view_cart') }}</a>
          </div>
        </div>
      </div>
      @endauth
    </div>

    {{-- Profile --}}
    <x-dropdown width="48">
      <x-slot name="trigger">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div class="w-full rounded-full">
            @auth
            <img src="https://placeimg.com/80/80/people" />
            @else
            <a class="h-full flex justify-center items-center" href="{{ route('profile.edit') }}">
              <svg class="fill-current w-5 h-5" width="32" height="32" viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 15C13.8 15 12 14.3 10.6 12.9C9.2 11.5 8.5 9.7 8.5 7.5C8.5 5.3 9.2 3.5 10.6 2.1C12 0.7 13.8 0 16 0C18.2 0 20 0.7 21.4 2.1C22.8 3.5 23.5 5.3 23.5 7.5C23.5 9.7 22.8 11.5 21.4 12.9C20 14.3 18.2 15 16 15ZM0 31.05V26.35C0 25.0833 0.316666 24 0.95 23.1C1.58333 22.2 2.4 21.5167 3.4 21.05C5.63333 20.05 7.775 19.3 9.825 18.8C11.875 18.3 13.9333 18.05 16 18.05C18.0667 18.05 20.1167 18.3083 22.15 18.825C24.1833 19.3417 26.3167 20.0833 28.55 21.05C29.5833 21.5167 30.4167 22.2 31.05 23.1C31.6833 24 32 25.0833 32 26.35V31.05H0ZM3 28.05H29V26.35C29 25.8167 28.8417 25.3083 28.525 24.825C28.2083 24.3417 27.8167 23.9833 27.35 23.75C25.2167 22.7167 23.2667 22.0083 21.5 21.625C19.7333 21.2417 17.9 21.05 16 21.05C14.1 21.05 12.25 21.2417 10.45 21.625C8.65 22.0083 6.7 22.7167 4.6 23.75C4.13333 23.9833 3.75 24.3417 3.45 24.825C3.15 25.3083 3 25.8167 3 26.35V28.05ZM16 12C17.3 12 18.375 11.575 19.225 10.725C20.075 9.875 20.5 8.8 20.5 7.5C20.5 6.2 20.075 5.125 19.225 4.275C18.375 3.425 17.3 3 16 3C14.7 3 13.625 3.425 12.775 4.275C11.925 5.125 11.5 6.2 11.5 7.5C11.5 8.8 11.925 9.875 12.775 10.725C13.625 11.575 14.7 12 16 12Z" fill="black" />
              </svg>
            </a>
            @endauth
          </div>
        </label>
      </x-slot>

      <x-slot name="content">
        @auth
        <div class="text-center text-xs opacity-80 p-2">{{ $user->name }}</div>
        <x-dropdown-link dir="auto" :href="route('profile.edit')">{{ __('auth.profile') }}</x-dropdown-link>
        <x-dropdown-link dir="auto" :href="route('orders')">{{ __('app.orders') }}</x-dropdown-link>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link dir="auto" :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
            {{ __('auth.logout') }}
          </x-dropdown-link>
        </form>
        @endauth
      </x-slot>
    </x-dropdown>
  </div>
</nav>
