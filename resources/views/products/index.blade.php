<x-layout>
  <div class="flex flex-col gap-4 py-2">
    <h1 class="text-center text-3xl">تصفح منتجاتنا</h1>
    <div class="grid grid-cols-3 gap-4 place-items-center w-3/5 mx-auto">
      @foreach($phones as $phone)
        <x-product-card 
          name="{{$phone['name']}}"
          price="{{$phone['price']}}"
          description="{{$phone['description'] ?? null}}"
          cover="{{$phone['cover'] ?? null}}"
          meta="{{$phone['meta'] ?? null}}"
        />
      @endforeach
    </div>
  </div>
</x-layout>