@props([
  'rate',
  'max' => 5,
  'size' => 'md'
])

<div {{ $attributes->class(['rating']) }}>
  @for($i = 1; $i <= $max; $i++) 
    <x-svg.star @class([
      'h-4 w-4' => $size === 'sm'
    ]) :filled='$i < $rate' />
    {{-- <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" @checked(round($rate) == $i) /> --}}
  @endfor
</div>