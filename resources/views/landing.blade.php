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

    <section class="bg-white px-6 py-24">
        <div class="mx-auto max-w-5xl">
            <h2 class="text-center font-display text-2xl font-bold uppercase sm:text-3xl">Tre segnali che la piattaforma ti
                sta frenando</h2>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <div class="border-t-4 border-brand pt-6">
                    <h3 class="text-lg font-bold">Il sito cade quando conta</h3>
                    <p class="mt-3 text-stone-600">
                        Black Friday, una campagna che funziona, un prodotto che gira sui social.
                        I picchi di traffico dovrebbero essere una festa e diventano un'emergenza
                        tra hosting, cache e plugin da riavviare.
                    </p>
                </div>

                <div class="border-t-4 border-brand pt-6">
                    <h3 class="text-lg font-bold">Ogni modifica costa un preventivo</h3>
                    <p class="mt-3 text-stone-600">
                        Aggiornamenti che rompono il tema, plugin a pagamento che si sovrappongono,
                        uno sviluppatore da chiamare anche per cambiare un banner.
                        La manutenzione si mangia il budget che dovrebbe andare in marketing.
                    </p>
                </div>

                <div class="border-t-4 border-brand pt-6">
                    <h3 class="text-lg font-bold">Vorresti cambiare, ma hai paura di perdere tutto</h3>
                    <p class="mt-3 text-stone-600">
                        Anni di posizionamento su Google, lo storico degli ordini, i clienti registrati.
                        È il motivo per cui rimandi da mesi. Ed è esattamente il lavoro che facciamo noi.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-ink px-6 py-24 text-white">
        <div class="mx-auto max-w-5xl">
            <h2 class="text-center font-display text-2xl font-bold uppercase sm:text-3xl">
                Come migriamo senza fermare le vendite
            </h2>
            <p class="mx-auto mt-4 max-w-2xl text-center text-stone-300">
                Il vecchio negozio resta online fino al giorno del passaggio.
                Nel frattempo costruiamo il nuovo in parallelo.
            </p>
            <ol class="mt-14 grid gap-10 md:grid-cols-4">
                <li>
                    <h3 class="text-xl font-bold text-brand">Audit</h3>
                    <p class="mt-2 text-stone-300">
                        Analizziamo catalogo, URL indicizzate, integrazioni e flussi d'ordine.
                        Decidiamo insieme cosa migrare e cosa lasciare indietro.
                    </p>
                </li>

                <li>
                    <h3 class="text-xl font-bold text-brand">Piano</h3>
                    <p class="mt-2 text-stone-300">
                        Mappa dei redirect URL per URL, piano dati per prodotti, clienti e ordini,
                        lista delle app che sostituiscono i plugin attuali.
                    </p>
                </li>

                <li>
                    <h3 class="text-xl font-bold text-brand">Build in parallelo</h3>
                    <p class="mt-2 text-stone-300">
                        Costruiamo il nuovo negozio su Shopify Plus mentre il vecchio continua a vendere.
                        Tu lo provi e lo approvi prima che vada online.
                    </p>
                </li>

                <li>
                    <h3 class="text-xl font-bold text-brand">Go-live e monitoraggio</h3>
                    <p class="mt-2 text-stone-300">
                        Passaggio del dominio, redirect attivi dal primo minuto,
                        controllo di Search Console e degli ordini nelle settimane successive.
                    </p>
                </li>

            </ol>
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
