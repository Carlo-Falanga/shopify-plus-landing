<form method="POST" action="{{ route('leads.store') }}" novalidate>
    @csrf

    @if ($errors->any())
        <p class="mb-6 border-l-4 border-red-600 bg-red-50 px-4 py-3 text-sm text-red-700">Controlla i campi evidenziati
            e riprova.</p>
    @endif

    <div class="space-y-5">
        <div>
            <label for="name" class="block text-sm font-semibold">Nome</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="name"
                class="mt-1 w-full border px-4 py-3 focus:border-ink focus:outline-none {{ $errors->has('name') ? 'border-red-600' : 'border-stone-300' }}">
            @error('name')
                <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email"
                class="mt-1 w-full border px-4 py-3 focus:border-ink focus:outline-none {{ $errors->has('email') ? 'border-red-600' : 'border-stone-300' }}">
            @error('email')
                <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="store_url" class="block text-sm font-semibold">Indirizzo del negozio</label>
            <input type="url" name="store_url" id="store_url" value="{{ old('store_url') }}" autocomplete="url"
                placeholder="www.tuonegozio.it"
                class="mt-1 w-full border px-4 py-3 focus:border-ink focus:outline-none {{ $errors->has('store_url') ? 'border-red-600' : 'border-stone-300' }}">
            @error('store_url')
                <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="current_platform" class="block text-sm font-semibold">Piattaforma attuale</label>
            <select name="current_platform" id="current_platform"
                class="mt-1 w-full border bg-white px-4 py-3 focus:border-ink focus:outline-none {{ $errors->has('current_platform') ? 'border-red-600' : 'border-stone-300' }}">
                <option value="">Seleziona</option>
                <option value="woocommerce" @selected(old('current_platform') === 'woocommerce')>WooCommerce</option>
                <option value="magento" @selected(old('current_platform') === 'magento')>Magento</option>
                <option value="prestashop" @selected(old('current_platform') === 'prestashop')>PrestaShop</option>
                <option value="shopify" @selected(old('current_platform') === 'shopify')>Shopify (non
                    Plus)</option>
                <option value="custom" @selected(old('current_platform') === 'custom')>Sviluppo su misura</option>
                <option value="other" @selected(old('current_platform') === 'other')>Altro</option>
            </select>
            @error('current_platform')
                <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="monthly_orders" class="block text-sm font-semibold">Ordini al mese <span
                    class="font-normal text-stone-500">(facoltativo)</span></label>
            <select name="monthly_orders" id="monthly_orders"
                class="mt-1 w-full border bg-white px-4 py-3 focus:border-ink focus:outline-none {{ $errors->has('monthly_orders') ? 'border-red-600' : 'border-stone-300' }}">
                <option value="">Preferisco non dirlo</option>
                <option value="0-500" @selected(old('monthly_orders') === '0-500')>Fino a 500</option>
                <option value="500-2000" @selected(old('monthly_orders') === '500-2000')>Da 500 a 2.000</option>
                <option value="2000-10000" @selected(old('monthly_orders') === '2000-10000')>Da 2.000 a
                    10.000</option>
                <option value="10000+" @selected(old('monthly_orders') === '10000+')>Oltre 10.000</option>
            </select>
            @error('monthly_orders')
                <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <button type="submit"
        class="mt-8 w-full bg-brand px-8 py-4 text-sm font-bold uppercase tracking-wide text-ink transition
  hover:bg-brand-dark">
        Prenota la call gratuita
    </button>
    <p class="mt-3 text-center text-xs text-stone-500">
        Nessuna newsletter. Ti scriviamo solo per fissare la call.
    </p>

</form>
