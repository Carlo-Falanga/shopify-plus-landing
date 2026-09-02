@extends('layouts.app')

@section('content')

    <header class="sticky top-0 z-10 bg-ink">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-4">
            <span class="text-lg font-bold tracking-tight text-white">Webgas</span>
            <a href="#richiesta"
                class="bg-brand px-5 py-2 text-sm font-bold uppercase tracking-wide text-ink transition hover:bg-brand-dark">
                Prenota la call
            </a>
        </div>
    </header>

    <section class="bg-ink px-6 pt-20 pb-24 text-center">
        <div class="mx-auto max-w-5xl">
            <p class="text-sm font-semibold uppercase tracking-widest text-brand">Shopify Plus Partner</p>
            <h1
                class="mx-auto mt-6 max-w-4xl font-display text-3xl font-extrabold uppercase leading-tight text-white sm:text-5xl">
                Il tuo e-commerce è cresciuto.<br>
                <span class="highlight">La tua piattaforma no.</span>
            </h1>
            <p class="mx-auto mt-8 max-w-2xl text-lg text-stone-300">
                Migriamo negozi da WooCommerce, Magento e piattaforme custom a Shopify Plus:
                senza perdere traffico, posizionamento e storico degli ordini, e senza fermare le vendite.
            </p>
            <div class="mt-10 flex flex-col items-center gap-3">
                <a href="#richiesta"
                    class="bg-brand px-8 py-4 text-sm font-bold uppercase tracking-wide text-ink transition hover:bg-brand-dark">
                    Prenota la call gratuita
                </a>
                <span class="text-sm text-stone-400">30 minuti, senza impegno</span>
            </div>
        </div>
    </section>

    <section class="border-b border-stone-200 bg-white px-6 py-12">
        <div class="mx-auto max-w-5xl text-center">
            <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">I brand che scalano con Webgas</p>
            <p
                class="mt-4 flex flex-wrap items-center justify-center gap-x-10 gap-y-3 text-xl font-semibold text-stone-800">
                <span>Iginio Massari</span>
                <span>E. Marinella</span>
                <span>Rifò</span>
                <span>Cofidis</span>
                <span class="text-sm font-normal text-stone-500">e altri 50+ brand</span>
            </p>
        </div>
    </section>

    <section id="richiesta" class="mx-auto max-w-5xl px-6 py-24">
        <h2 class="text-3xl font-bold tracking-tight">Prenota la call gratuita</h2>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('leads.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Nome">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="store_url" placeholder="URL negozio">
            <select name="current_platform">
                <option value="">Piattaforma...</option>
                <option value="woocommerce">WooCommerce</option>
                <option value="magento">Magento</option>
            </select>

            <button type="submit">Invia</button>
        </form>
    </section>

@endsection
