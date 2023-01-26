<x-layout>
  <div class="flex flex-col gap-4 py-5">
    <h1 class="text-center text-3xl">تصفح منتجاتنا</h1>
    <div class="grid grid-cols-3 gap-4 place-items-center w-3/5 mx-auto">
      @foreach($products as $product)
        <x-product-card
          name="{!! $product['name'] !!}"
          price="{!! $product['price'] !!}"
          description="{!! ($product['description'] ?? null) !!}"
          cover="{!! ($product['cover'] ?? null) !!}"
          meta="{!! ($product['meta'] ?? null) !!}"
        />
      @endforeach
    </div>
  </div>
</x-layout>