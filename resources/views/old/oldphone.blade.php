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
        <div class="flex h-full justify-center items-center">
            <h1 dir="auto" class="text-3xl">عدد الهواتف القديمة = 254 هاتف</h1>
        </div>
    </body>
</html>
