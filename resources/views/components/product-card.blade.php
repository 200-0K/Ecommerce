@props([
  'url',
  'id',
  'name', 
  'price',
  'newPrice' => null,
  'rate' => 0.0,
  'currency',
  'cover' => 'https://placeimg.com/640/480/tech',
  'commentsCount' => 0
])

@php
  $discount = $newPrice ? round(abs($newPrice / $price - 1) * 100) : null;
@endphp

<div x-data="toast" class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
  <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="{{ $url }}">
    <img  class="object-cover w-full" src="{{ $cover }}" alt="product image" />
    @if($discount)
      <span class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">{{ __('app.discount', ['percent' => $discount]) }}</span>
    @endif
  </a>
  <div x-data="cart({{ $id }})" class="mt-4 px-5 pb-5">
    <a href="{{ $url }}">
      <h5 class="text-xl tracking-tight text-slate-900">{{ $name }}</h5>
    </a>
    <div class="mt-2 mb-5 flex items-center justify-between">
      <p>
        @if($newPrice)
          <span class="text-3xl font-bold text-slate-900">{{ $newPrice }}<span class="text-sm">{{ $currency }}</span></span>
          <span class="text-sm text-slate-900 line-through">{{ $price }}<span class="text-xs">{{ $currency }}</span></span>
        @else
          <span class="text-3xl font-bold text-slate-900">{{ $price  }}<span class="text-sm">{{ $currency }}</span></span>
        @endif
      </p>
      <div class="flex items-center">
        <x-stars max="5" :rate="$rate" />
        <div class="flex flex-col gap-1 mr-2 ml-3">
          <span class="rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold text-center">{{ $rate }}</span>
          @if($commentsCount > 0)
            <span class="border border-slate-200 px-2.5 py-0.5 text-xs font-semibold text-center">{{ $commentsCount }}</span>
          @endif
        </div>
      </div>
    </div>
    
    @if(Auth::check())
      <div @click="store().then(b => b && success('{{ __('cart.added_to_cart') }}'))" class="btn bg-slate-900 flex items-center justify-center gap-3 rounded-md  px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        {{ __('app.add_cart') }}
      </div>
    @else
      <div class="btn bg-slate-900 btn-disabled opacity-60 flex items-center justify-center gap-3 rounded-md  px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        {{ __('auth.login_required') }}
      </div>
    @endif

  </div>
</div>