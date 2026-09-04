<!DOCTYPE html>
<html lang="it" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (config('services.gtm.id'))
        @include('partials.gtm-head')
    @endif
    <title>@yield('title', 'Migrazione a Shopify Plus senza perdere SEO e ordini - Webgas')</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans text-ink antialiased">
    @if (config('services.gtm.id'))
        @include('partials.gtm-body')
    @endif
    @yield('content')
    @stack('scripts')
</body>

</html>
