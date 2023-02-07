{{-- Template Source: https://componentland.com/component/checkout-page-2 --}}
<x-app-layout class="flex flex-col">

  @unless($products->count() > 0)
  <div class="flex-1 flex flex-col gap-4 items-center justify-center bg-white py-20 sm:px-10 lg:px-20 xl:px-32">
    <svg class="w-full h-full max-h-20" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 48 48">
      <path d="M14.5 44q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55Q13 36.8 14.5 36.8q1.5 0 2.55 1.05 1.05 1.05 1.05 2.55 0 1.5-1.05 2.55Q16 44 14.5 44Zm20.2 0q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.05 1.05 1.05 1.05 2.55 0 1.5-1.05 2.55Q36.2 44 34.7 44ZM24 18.8q-.7 0-1.2-.5t-.5-1.2q0-.7.5-1.2t1.2-.5q.7 0 1.2.5t.5 1.2q0 .7-.5 1.2t-1.2.5ZM22.5 12V2h3v10Zm-8 21.65q-2.1 0-3.075-1.7-.975-1.7.025-3.45l3.05-5.55L7 7H3.1V4h5.8l8.5 18.2H32l7.8-14 2.6 1.4-7.65 13.85q-.45.85-1.225 1.3-.775.45-1.825.45h-15l-3.1 5.45h24.7v3Z" /></svg>
    <p class="text-3xl font-bold text-black/80">{{ __('cart.no_cart_products_message') }}</p>
    <a href="{{ route('explore') }}" class="btn btn-primary font-bold">{{ __('app.continue_shopping') }}</a>
  </div>
  @else
  <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
    <div class="mt-4 py-2 text-xs mx-auto sm:mt-0 sm:ml-auto sm:text-base">
      <div class="relative">
        <ul class="relative flex w-full items-center justify-between gap-4 space-x-2 sm:space-x-4">
          <li class="flex items-center gap-3 text-left">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="{{ route('explore') }}"><svg xmlns="http://www.w3.org/2000/svg" class="group- h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg></a>
            <span class="font-semibold text-gray-900">{{ __('app.shop') }}</span>
          </li>
          <svg xmlns="http://www.w3.org/2000/svg" class="rtl:-scale-100 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
          <li class="flex items-center gap-3 text-left">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-600 text-xs font-semibold text-white ring ring-gray-600 ring-offset-2">2</a>
            <span class="font-semibold text-gray-900">{{ __('app.payment') }}</span>
          </li>
          <svg xmlns="http://www.w3.org/2000/svg" class="rtl:-scale-100 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
          <li class="flex items-center gap-3 text-left">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white">3</a>
            <span class="font-semibold text-gray-500">{{ __('app.invoice') }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
    <div class="px-4 pt-8">
      <p class="text-xl font-medium" dir="auto">{{ __('cart.order_summary.title') }}</p>
      <p class="text-gray-400" dir="auto">{{ __('cart.order_summary.description') }}</p>
      <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
        @foreach($products as $product)
        <x-checkout-product-item :url="route('product.show', $product)" :name="$product->name" :cover="$product->images()->first()->url" :qty="$product->pivot->qty" :price="($product->new_price ?? $product->price) * $product->pivot->qty" :currency="$currency" />
        @endforeach
      </div>

      {{-- Shipping Address --}}
      {{-- <p class="mt-8 text-lg font-medium">Shipping Methods</p>
        <form class="mt-5 grid gap-6">
          <div class="relative">
            <input class="peer hidden" id="radio_1" type="radio" name="radio" checked />
            <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
            <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_1">
              <img class="w-14 object-contain" src="/images/naorrAeygcJzX0SyNI4Y0.png" alt="" />
              <div class="ml-5">
                <span class="mt-2 font-semibold">Fedex Delivery</span>
                <p class="text-slate-500 text-sm leading-6">Delivery: 2-4 Days</p>
              </div>
            </label>
          </div>
          <div class="relative">
            <input class="peer hidden" id="radio_2" type="radio" name="radio" checked />
            <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
            <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_2">
              <img class="w-14 object-contain" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
              <div class="ml-5">
                <span class="mt-2 font-semibold">Fedex Delivery</span>
                <p class="text-slate-500 text-sm leading-6">Delivery: 2-4 Days</p>
              </div>
            </label>
          </div>
        </form> --}}
    </div>

    <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
      <p class="text-xl font-medium" dir="auto">{{ __('cart.payment_details.title') }}</p>
      <p class="text-gray-400" dir="auto">{{ __('cart.payment_details.description') }}</p>
      <form action="{{route('checkout.proceed')}}" method="POST">
        @csrf
        {{-- <label for="email" class="mt-4 mb-2 block text-sm font-medium">{{ __('validation.attributes.email') }}</label>
        <div class="relative">
          <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>
          </div>
        </div> --}}
        <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">{{ __('validation.attributes.card_holder') }}</label>
        <div class="relative">
          <input type="text" id="card-holder" name="card-holder" value="{{ old('card-holder') }}" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" required />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
          </div>
        </div>
        <x-input-error :messages="$errors->get('card-holder')" class="mb-2" />

        <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">{{ __('validation.attributes.card_details') }}</label>
        <div class="flex">
          <div class="relative w-7/12 flex-shrink-0">
            <input type="text" id="card-no" name="card-no" value="{{ old('card-no') }}" class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" pattern="\d+" required />
            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
              <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
              </svg>
            </div>
          </div>
          <input type="text" name="credit-expiry" value="{{ old('credit-expiry') }}" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="MM/YY" pattern="\d{2}/\d{2}" maxlength="5" required />
          <input type="text" name="credit-cvc" value="{{ old('credit-cvc') }}" class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="CVC" pattern="\d{3,4}" maxlength="4" required />
        </div>
        <x-input-error :messages="$errors->get('card-no')" class="mb-2" />
        <x-input-error :messages="$errors->get('credit-expiry')" class="mb-2" />
        <x-input-error :messages="$errors->get('credit-cvc')" class="mb-2" />

        {{-- Address --}}
        <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">{{ __('validation.attributes.address') }}</label>
        <div class="flex flex-col sm:flex-row">
          <select type="text" name="billing-city" class="text-center w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
            @foreach($cities as $city)
            <option value="{{ $city->id }}" @selected(old('billing-city') == $city->id)>{{ $city->name }}</option>
            @endforeach
          </select>

          <div class="relative flex-shrink-0 sm:w-7/12">
            <input type="text" id="billing-address" name="billing-address" value="{{ old('billing-address') }}" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="{{ __('validation.attributes.address') }}" required />
            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
              <img class="h-4 w-4 object-contain" src="https://flagpack.xyz/_nuxt/504692f0f09c3fe396344ee04ac8ace9.svg" alt="Saudi Arabia Flag" />
            </div>
          </div>

          <input type="text" name="billing-zip" value="{{ old('billing-zip') }}" class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="{{ __('validation.attributes.zip') }}" required />
        </div>
        <x-input-error :messages="$errors->get('billing-city')" class="mb-2" />
        <x-input-error :messages="$errors->get('billing-address')" class="mb-2" />
        <x-input-error :messages="$errors->get('billing-zip')" class="mb-2" />

        <!-- Total -->
        <div class="mt-6 border-t border-b py-2">
          <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-900">{{ __('app.subtotal') }}</p>
            <p class="font-semibold text-gray-900">{{ $subtotal }}<span class="text-xs">{{ $currency }}</span></p>
          </div>
          <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-900">{{ __('app.tax') }} — <span class="text-xs text-black/80">%{{ $tax * 100 }}</span></p>
            <p class="font-semibold text-gray-900">{{ $subtotal * $tax }}<span class="text-xs">{{ $currency }}</span></p>
          </div>
          {{-- Shipping Cost --}}
          {{-- <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-900">{{ __('app.shipping') }}</p>
            <p class="font-semibold text-gray-900">{{ $shipping }}<span class="text-xs">{{ $currency }}</span></p>
          </div> --}}
        </div>
        <div class="mt-6 flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900">{{ __('app.total') }}</p>
          <p class="text-2xl font-semibold text-gray-900">{{ $total }}<span class="text-xs">{{ $currency }}</span></p>
        </div>
        <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">{{ __('cart.place_order') }}</button>
      </form>
    </div>
  </div>
  @endunless
</x-app-layout>
