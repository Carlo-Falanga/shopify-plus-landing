@extends('layouts.app')

@section('title', 'Richiesta ricevuta - Webgas')

@section('content')
    <div class="flex min-h-screen flex-col bg-ink">
        <header>
            <div class="mx-auto max-w-5xl px-6 py-4">
                <a href="{{ route('landing') }}" class="text-lg font-bold tracking-tight text-white">Webgas</a>
            </div>
        </header>
        <main class="flex flex-1 items-center px-6 py-24 text-center">
            <div class="mx-auto max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-widest text-brand">Richiesta ricevuta</p>
                <h1 class="mt-6 font-display text-3xl font-extrabold uppercase leading-tight text-white sm:text-5xl">
                    <span class="highlight">Grazie.</span> Ti scriviamo entro un giorno lavorativo.
                </h1>
                <p class="mt-8 text-lg text-stone-300">
                    Un consulente Webgas guarda il tuo negozio e ti propone data e ora per la call di 30 minuti.
                    Se non vedi la mail, controlla anche la cartella spam.
                </p>
                <a href="{{ route('landing') }}"
                    class="mt-10 inline-block border border-white px-8 py-4 text-sm font-bold uppercase tracking-wide text-white transition hover:bg-white hover:text-ink">
                    Torna alla pagina
                </a>
            </div>
        </main>
    </div>
@endsection
