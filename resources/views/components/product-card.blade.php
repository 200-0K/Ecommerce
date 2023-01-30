@props([
  'name', 'price',
  'description' => null, 'cover' => 'https://placeimg.com/640/480/tech', 'meta' => null
])

<div href="#" class="card w-72 h-96 bg-base-100 shadow-xl image-full">
  @if($cover)
    <figure><img class="w-full h-full" src="{{ $cover }}" alt="{{ $name }} photo" /></figure>
  @endif
  <div class="card-body">
    <h2 class="card-title">{{ $name }}</h2>
    @if($description)
      <p class="font-light">{{ $description }}</p>
    @endif
    @if($meta)
      <small>{{ $meta }}</small>
    @endif
    <div class="card-actions justify-end items-end flex-1">
      <button class="btn btn-outline text-base-100" dir="auto">{{ $price }}</button>
    </div>
  </div>
</div>