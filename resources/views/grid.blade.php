<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;500;700&display=swap" rel="stylesheet">
        <title>PhoneApp</title>
        @vite("resources/js/app.js")
    </head>
    <body class="antialiased font-cairo h-screen">
        <div class="grid grid-cols-3 place-items-center place-content-center gap-y-4 h-full">
          
          <span class="font-bold">رقم الهاتف</span>
          <span class="font-bold">النوع</span>
          <span class="font-bold">السعر</span>

          <span>{{ $number }}</span>
          <span>{{ $type }}</span>
          <span>{{ $price }} {{ $currency }}</span>
          
        </div>
    </body>
</html>
