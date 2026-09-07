@php
    $pageTitle = $title ?? config('app.name');
    $metaDescription = filled($description ?? null)
        ? $description
        : __("Kota Jababeka is Indonesia's pioneering integrated industrial estate and township in Cikarang — combining industrial estates, business parks, residential, education, and lifestyle facilities.");
    $metaImage = filled($image ?? null) ? $image : asset('images/brand/logo-color.png');
    $canonicalUrl = $canonical ?? url()->current();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $metaDescription }}">
        <meta name="robots" content="{{ $robots ?? 'index, follow' }}">
        <link rel="canonical" href="{{ $canonicalUrl }}">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ config('app.name') }}">
        <meta property="og:title" content="{{ $pageTitle }}">
        <meta property="og:description" content="{{ $metaDescription }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">
        <meta property="og:image" content="{{ $metaImage }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $pageTitle }}">
        <meta name="twitter:description" content="{{ $metaDescription }}">
        <meta name="twitter:image" content="{{ $metaImage }}">

        <link rel="icon" type="image/webp" href="{{ asset('images/brand/favicon.webp') }}">

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
