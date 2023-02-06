@props(['name', 'cover', 'price', 'currency', 'qty'])

<div class="flex flex-col rounded-lg bg-white sm:flex-row">
  <div class="h-24 w-28"><img class="m-2 h-full w-full rounded-md border object-cover object-center" src="{{ $cover }}" alt="{{ $name }} Image" /></div>
  <div class="flex w-full flex-col px-4 py-4">
    <span class="font-semibold">{{ $name }}</span>
    <span class="float-right text-gray-400">{{ $qty }}x</span>
    <p class="text-lg font-bold">{{ $price  }}<span class="text-xs">{{ $currency }}</span></p>
  </div>
</div>
