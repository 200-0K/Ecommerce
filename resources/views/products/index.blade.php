<x-app-layout>
  <div class="flex flex-col gap-8 py-5 items-center">
    <h1 class="text-center text-3xl">{{ __('app.explore_our_products') }}</h1>
    <div class="grid grid-cols-3 gap-4 place-items-center w-3/5 mx-auto">
      @foreach($products as $product)
        <x-product-card
          :url="route('product.show', $product)"
          :id="$product->id"
          :name="$product->name"
          :price="$product->price"
          :newPrice="$product->new_price"
          :currency="$product->currency"
          :rate="$product->rate"
          :cover="$product->cover"
          :commentsCount="$product->commentsCount"
        />
      @endforeach
    </div>
    {{ $products->links() }}
  </div>
</x-app-layout>