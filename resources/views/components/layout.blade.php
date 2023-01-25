@props(['title'])
@php
  $title = ($title ?? false) ? $title.' - ' : '';
  $title .= config('app.name');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&family=Cairo:wght@300;500;700&display=swap" rel="stylesheet">

        @vite("resources/js/app.js")
    </head>
    <body class="antialiased">
      <div class="min-h-screen flex flex-col">
        @include("layouts.header")
        <main {{ $attributes->merge(["class" => "flex-1"]) }}>
          {{ $slot }}
        </main>
        @include("layouts.footer")
      </div>
    </body>
</html>
