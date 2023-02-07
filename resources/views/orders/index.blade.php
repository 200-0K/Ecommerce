<x-app-layout>
<div class="mx-auto max-w-screen-xl bg-white">
  <h1 class="mt-20 mb-10 ml-5 text-2xl font-bold text-gray-900">{{ __('app.orders') }}</h1>
  {{-- <div class="bg-white py-2 px-3">
    <nav class="flex flex-wrap gap-4">
      <a href="#" class="inline-flex whitespace-nowrap border-b-2 border-transparent border-b-purple-600 py-2 px-3 text-sm font-semibold text-purple-600 transition-all duration-200 ease-in-out">{{ __('app.orders') }}</a>
      <a href="#" class="inline-flex whitespace-nowrap border-b-2 border-transparent py-2 px-3 text-sm font-medium text-gray-600 transition-all duration-200 ease-in-out hover:border-b-purple-600 hover:text-purple-600"> Sales </a>
    </nav>
  </div> --}}
</div>
<div class="w-full bg-gray-50">
  <div class="mx-auto max-w-screen-xl px-2 py-10">
    {{-- <div class="mt-4 w-full">
      <div class="flex w-full flex-col items-center justify-between space-y-2 sm:flex-row sm:space-y-0">
        <form class="relative flex w-full max-w-2xl items-center">
          <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8" class=""></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
          </svg>
          <input type="name" name="search" class="h-12 w-full border-b-gray-400 bg-transparent py-4 pl-12 text-sm outline-none focus:border-b-2" placeholder="Search by Order ID, Date, Customer" />
        </form>

        <button type="button" class="relative mr-auto inline-flex cursor-pointer items-center rounded-full border border-gray-200 bg-white px-5 py-2 text-center text-sm font-medium text-gray-800 hover:bg-gray-100 focus:shadow sm:mr-0">
          <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
          <svg class="mr-2 h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
          </svg>
          Filter
        </button>
      </div>
    </div> --}}

    <div class="mt-6 overflow-hidden rounded-xl bg-white px-6 shadow lg:px-4">
      @unless($orders->count() > 0)

      @else
      <table class="min-w-full border-collapse border-spacing-y-2 border-spacing-x-2">
        <thead class="hidden border-b lg:table-header-group">
          <tr>
            <td class="whitespace-normal py-4 text-sm font-semibold text-gray-800 sm:px-3">
              {{ __('app.order_date') }}
              {{-- <svg xmlns="http://www.w3.org/2000/svg" class="float-right mx-2 mt-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
              </svg> --}}
            </td>

            <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">{{ __('app.order_id') }}</td>
            <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">{{ __('app.category') }}</td>
            <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">{{ __('app.company') }}</td>

            <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">{{ __('app.customer') }}</td>

            <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">
              {{ __('app.price') }}
              {{-- <svg xmlns="http://www.w3.org/2000/svg" class="float-right mt-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
              </svg> --}}
            </td>

            {{-- <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">Status</td> --}}
          </tr>
        </thead>

        <tbody class="bg-white lg:border-gray-300">
          @foreach($orders as $order)
          <tr class="rtl:text-right">
            <td class="whitespace-no-wrap py-4 text-left text-sm text-gray-600 sm:px-3 lg:text-left rtl:text-right">
              {{$order->date}}
              <div class="mt-1 flex flex-col text-xs font-medium lg:hidden">
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  {{ $order->user->name }}
                </div>
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                  </svg>
                  {{ $order->product->category->name }}
                </div>
              </div>
            </td>

            <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-600 sm:px-3 lg:table-cell">{{ $order->id }}</td>
            <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-600 sm:px-3 lg:table-cell">{{ $order->product->category->name }}</td>
            <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-600 sm:px-3 lg:table-cell">{{ $order->product->company->name }}</td>
            <td class="whitespace-no-wrap hidden py-4 text-left text-sm text-gray-600 sm:px-3 lg:table-cell lg:text-left rtl:text-right">Jane Doeson</td>
            <td class="whitespace-no-wrap py-4 text-right text-sm text-gray-600 sm:px-3 lg:text-left" dir="auto">
              {{ $order->price }} <span class="text-xs">{{ $currency }}</span>
            </td>
          </tr>
          @endforeach
          
        </tbody>
        @endunless
      </table>
    </div>
  </div>
</div>

</x-app-layout>