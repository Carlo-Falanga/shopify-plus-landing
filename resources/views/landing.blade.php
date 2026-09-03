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
    {{-- Hero --}}
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
    {{-- Trust band --}}
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
    {{-- Problems --}}
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
    {{-- Process --}}
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
    {{-- Why Webgas --}}
    <section class="border-t border-stone-200 bg-white px-6 py-24">
        <div class="mx-auto max-w-5xl">
            <h2 class="text-center font-display text-2xl font-bold uppercase sm:text-3xl">
                Perché affidare la migrazione a Webgas
            </h2>
            <div class="mt-12 grid gap-10 md:grid-cols-2">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Certificazione</p>
                    <h3 class="mt-2 text-lg font-bold">Partner ufficiale Shopify Plus</h3>
                    <p class="mt-2 text-stone-600">
                        Lavoriamo sulla piattaforma con l'accesso diretto a Shopify e ai suoi strumenti per gli store
                        enterprise.
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Esperienza</p>
                    <h3 class="mt-2 text-lg font-bold">Oltre 50 brand seguiti</h3>
                    <p class="mt-2 text-stone-600">
                        Da Iginio Massari a E. Marinella, da Rifò a Cofidis: negozi con cataloghi, volumi e integrazioni
                        molto diversi tra loro.
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Caso reale</p>
                    <h3 class="mt-2 text-lg font-bold">Caldaiemurali.it su Shopify Plus</h3>
                    <p class="mt-2 text-stone-600">
                        Migrazione completa con redesign dell'esperienza utente per un e-commerce di apparecchiature
                        termoidrauliche.
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">Un solo team</p>
                    <h3 class="mt-2 text-lg font-bold">Sviluppo, dati e advertising in casa</h3>
                    <p class="mt-2 text-stone-600">
                        Google Partner e Meta Business Partner: chi migra il sito è lo stesso team che poi fa girare le
                        campagne. Nessun rimpallo tra fornitori.
                    </p>
                </div>

            </div>
        </div>
    </section>
    {{-- FAQ --}}
    <section class="border-t border-stone-200 bg-white px-6 py-24">
        <div class="mx-auto max-w-3xl">
            <h2 class="text-center font-display text-2xl font-bold uppercase sm:text-3xl">
                Domande frequenti
            </h2>
            <div class="mt-12 divide-y divide-stone-200 border-y border-stone-200">
                <details class="group py-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-bold">
                        Perderemo il posizionamento su Google?
                        <span class="text-xl text-stone-400 transition group-open:rotate-45">+</span>
                    </summary>
                    <p class="mt-3 text-stone-600">
                        No, se la migrazione è fatta bene. Mappiamo ogni URL del vecchio sito su quella nuova con redirect
                        301,
                        migriamo titoli, descrizioni e contenuti, e teniamo sotto controllo Search Console dopo il go-live.
                    </p>
                </details>
                <details class="group py-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-bold">
                        Lo storico degli ordini e i clienti registrati si perdono?
                        <span class="text-xl text-stone-400 transition group-open:rotate-45">+</span>
                    </summary>
                    <p class="mt-3 text-stone-600">
                        Prodotti, clienti e ordini vengono migrati. L'unica cosa che non si può trasferire sono le
                        password,
                        perché sono cifrate: i clienti ricevono un invito a impostarne una nuova al primo accesso.
                    </p>
                </details>
                <details class="group py-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-bold">
                        Il negozio si ferma durante il passaggio?
                        <span class="text-xl text-stone-400 transition group-open:rotate-45">+</span>
                    </summary>
                    <p class="mt-3 text-stone-600">
                        No. Il nuovo negozio viene costruito in parallelo e il vecchio continua a vendere fino al cambio di
                        dominio,
                        che programmiamo in una fascia oraria a basso traffico.
                    </p>
                </details>
                <details class="group py-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-bold">
                        Abbiamo tante personalizzazioni fatte su misura
                        <span class="text-xl text-stone-400 transition group-open:rotate-45">+</span>
                    </summary>
                    <p class="mt-3 text-stone-600">
                        Le censiamo nell'audit. Molte hanno già un equivalente tra le app Shopify,
                        le altre le ricostruiamo come app dedicate. Spesso alcune non servono più.
                    </p>
                </details>
                <details class="group py-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-bold">
                        Shopify Plus ha un canone: conviene davvero?
                        <span class="text-xl text-stone-400 transition group-open:rotate-45">+</span>
                    </summary>
                    <p class="mt-3 text-stone-600">
                        Va confrontato con il costo totale di oggi: hosting, plugin a pagamento, ore di sviluppo,
                        vendite perse nei picchi. Nella call facciamo il conto insieme sui tuoi numeri.
                    </p>
                </details>
                <details class="group py-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-bold">
                        Quanto tempo ci vuole?
                        <span class="text-xl text-stone-400 transition group-open:rotate-45">+</span>
                    </summary>
                    <p class="mt-3 text-stone-600">
                        Dipende da catalogo e integrazioni. Dopo aver visto il negozio, nella call ti diamo una stima
                        realistica e non una promessa.
                    </p>
                </details>
            </div>
        </div>
    </section>
    {{-- Form --}}
    <section id="richiesta" class="bg-ink px-6 py-24">
        <div class="mx-auto max-w-5xl">
            <h2 class="text-center font-display text-2xl font-bold uppercase text-white sm:text-3xl">Prenota la call
                gratuita</h2>
            <p class="mx-auto mt-4 max-w-2xl text-center text-stone-300">
                30 minuti, senza impegno. Guardiamo insieme il tuo negozio e ti diciamo cosa comporta davvero la
                migrazione.
            </p>
            <div class="mx-auto mt-12 max-w-xl bg-white p-8">
                @include('partials.lead-form')
            </div>
        </div>
    </section>
@endsection
