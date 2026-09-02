<h1>Landing provvisoria</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('leads.store') }}">
    @csrf
    <input type="text" name="name" placeholder="nome">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="store_url" placeholder="URL negozio">
    <select name="current_platform">
        <option value="">Piattaforma...</option>
        <option value="woocommerce">Woocommerce</option>
        <option value="magento">magento</option>
    </select>

    <button type="submit">Invia</button>

</form>