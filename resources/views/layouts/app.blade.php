<!DOCTYPE html>
<html lang="it" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (config('services.gtm.id'))
        @include('partials.gtm-head')
    @endif
    <title>@yield('title', 'Migrazione a Shopify Plus senza perdere SEO e ordini - Webgas')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans text-ink antialiased">
    @if (config('services.gtm.id'))
        @include('partials.gtm-body')
    @endif
    @yield('content')
</body>

</html>
