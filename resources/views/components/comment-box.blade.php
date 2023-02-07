@props([
'name',
'profilePic',
'comment',
'rate',
'date',
])

<div {{ $attributes->class(['mx-auto my-10 max-w-2xl rounded-xl border px-4 py-6 text-gray-700'])}}>
  <div class="mb-5">
    <div class="flex items-center">
      <img class="h-10 w-10 rounded-full object-cover" src="{{ $profilePic }}" alt="{{ $name }}" />
      <div class="flex flex-col gap-1 ml-4 max-w-5xl">
        <div>
          <strong class="font-medium text-gray-700">{{ $name }}</strong> — <span class="text-sm text-gray-400">{{ Carbon\Carbon::parse($date)->format('d/m/Y') }}</span>
        </div>
        <x-stars size="sm" max="5" :$rate />
      </div>
    </div>
  </div>
  <p class="mb-3">{{ $comment }}</p>
  {{-- <div class="rounded-lg bg-gray-100 p-4">
    <p class="mb-2 text-gray-500">You commented on Sep 4</p>
    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia rem eum nostrum.</p>
  </div> --}}
</div>
