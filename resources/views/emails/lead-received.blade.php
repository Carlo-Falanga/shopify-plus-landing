<p>Nuova richiesta di migrazione dalla landing Shopify Plus.</p>

<ul>
    <li>Nome: {{ $lead->name }}</li>
    <li>Email: {{ $lead->email }}</li>
    <li>Negozio: {{ $lead->store_url }}</li>
    <li>Piattaforma attuale: {{ $lead->current_platform }}</li>
    <li>Ordini al mese: {{ $lead->monthly_orders ?? 'non indicato' }}</li>
</ul>
