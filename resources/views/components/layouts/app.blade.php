<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('images/brand/logo.png') }}">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-screen flex-col bg-white text-slate-800 antialiased">
        <x-site-header :active-nav="$activeNav ?? ''" :breadcrumbs="$breadcrumbs ?? []" />

        <main class="flex-1">
            {{ $slot }}
        </main>

        <x-site-footer />
    </body>
</html>
