<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifications</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs@2.8.2/dist/alpine.js" defer></script>

    @vite(['resources/css/app.css'])
</head>

<body
    class="flex flex-col min-h-screen antialiased bg-dots-darker dark:bg-dots-lighter bg-center bg-gray-100 dark:bg-gray-900">
    @include('layouts.partials.navbar')
    <main class="flex-grow container mx-auto py-8">
        @yield('content')
    </main>
    @include('layouts.partials.footer')
</body>

</html>
