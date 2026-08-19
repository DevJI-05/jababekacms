<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white text-slate-800 antialiased">
        <x-site-header :active-nav="$activeNav ?? ''" :breadcrumbs="$breadcrumbs ?? []" />

        <main>
            {{ $slot }}
        </main>

        <x-site-footer />
    </body>
</html>
