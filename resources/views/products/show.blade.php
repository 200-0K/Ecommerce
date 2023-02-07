<x-app-layout>
  <section dir="ltr" class="text-gray-700 body-font overflow-hidden bg-white">
    <div x-data="toast" class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200 h-[35rem]" src="{{ $product->cover }}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest" dir="auto">{{ $product->company->name }}</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1" dir="auto">{{ $product->name }}</h1>
          <div class="flex mb-4">
            <span class="flex items-center">
              <x-stars max="5" :rate="$product->rate" />
              <span class="text-gray-600 ml-3" dir="auto">{{ $product->commentsCount }} {{ __('app.comments') }}</span>
            </span>
            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
              <a class="text-gray-500" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"> {{-- Facebook --}}
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500" href="https://twitter.com/intent/tweet?text=%F0%9F%8F%AC%20%D9%85%D8%AA%D8%AC%D8%B1%20{{ config('app.name') }}%0A%F0%9F%94%97%20%D8%A7%D9%84%D8%B1%D8%A7%D8%A8%D8%B7%20{{ url()->current() }}" target="_blank"> {{-- Twitter --}}
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
              </a>
            </span>
          </div>
          <p class="leading-relaxed" dir="auto">{{ $product->description }}</p>
          <div class="divider"></div>
          {{-- <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex">
              <span class="mr-3">Color</span>
              <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
              <button class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
              <button class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"></button>
            </div>
            <div class="flex ml-6 items-center">
              <span class="mr-3">Size</span>
              <div class="relative">
                <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                  <option>SM</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                </select>
                <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </span>
              </div>
            </div>
          </div> --}}
          <div x-data="cart({{ $product->id }})" class="flex">
            <p>
              @if($product->newPrice)
              <span class="text-3xl font-bold text-slate-900">{{ $product->newPrice }}<span class="text-sm">{{ $product->currency }}</span></span>
              <span class="text-sm text-slate-900 line-through">{{ $product->price }}<span class="text-xs">{{ $product->currency }}</span></span>
              @else
              <span class="text-3xl font-bold text-slate-900">{{ $product->price  }}<span class="text-sm">{{ $product->currency }}</span></span>
              @endif
            </p>
            
            @if($product->qty < 1)
              <button
              class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none rounded opacity-50 select-none cursor-default"
              >{{ __('app.out_of_stock') }}</button>
            @elseif(Auth::check())
              <button 
              @click="store().then(b => b && error(`{{ __('cart.added_to_cart') }}`))"
              class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded"
              >{{ __('app.add_to_cart') }}</button>
            @else
              <button
              class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none rounded opacity-50 select-none cursor-default"
              >{{ __('auth.login_required') }}</button>
            @endif

            <button 
            <button class="select-none cursor-default rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
      @if($product->commentsCount > 0)
      <div class="divider">{{ __('app.comments') }}</div>
      <div>
        @foreach($product->ordersWithComments as $order)
          <x-comment-box
            :name="$order->invoice->user->name"
            profilePic="https://placeimg.com/640/480/tech"
            :comment="$order->comment"
            :rate="$order->rate"
            :date="$order->created_at"
          />
        @endforeach
      </div>
      @endif
    </div>
  </section>
</x-app-layout>
