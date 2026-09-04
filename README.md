# Landing page: migrazione a Shopify Plus

Landing page di conversione per il servizio di migrazione e replatforming su Shopify Plus di Webgas.
Una sola call to action: prenotare una call gratuita di 30 minuti tramite il form in fondo alla pagina.

Prova pratica per la posizione di Full Stack Developer Intern. Stack: Laravel 13, Blade, Tailwind CSS 4, SQLite.

## Avviare il progetto da zero

Requisiti: PHP 8.3 o superiore, Composer, Node 20 o superiore.

```bash
git clone https://github.com/Carlo-Falanga/shopify-plus-landing.git
cd shopify-plus-landing
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install
npm run dev
```

In un secondo terminale:

```bash
php artisan serve
```

La landing è su http://localhost:8000. La pagina di ringraziamento è su /grazie.

Su Windows, al posto di `touch` creare un file vuoto `database/database.sqlite` a mano
(oppure rispondere sì quando `php artisan migrate` chiede di crearlo).

### Dove vedere il lead e la mail

- I lead si salvano nella tabella `leads` del database SQLite.
- La notifica email usa il driver `log`: dopo un invio, il testo della mail è in fondo a `storage/logs/laravel.log`.
  Il destinatario si imposta in `.env` con `MAIL_LEAD_TO`.

### Attivare Google Tag Manager

Il container GTM si carica solo se in `.env` è valorizzato `GTM_ID` (per esempio `GTM_ID=GTM-XXXXXXX`).
Senza quel valore la pagina funziona uguale, senza script di tracciamento.

## Le decisioni che ho preso

### A chi parla la pagina

A chi ha un e-commerce su WooCommerce, Magento o una piattaforma custom che sta crescendo e comincia a soffrire:
il sito cade nei picchi, ogni modifica costa un preventivo, e la migrazione fa paura perché si teme di perdere
posizionamento e storico degli ordini. Ho scelto questo profilo perché è quello che ha più da guadagnare da Shopify Plus
e più obiezioni da superare. Chi è già su Shopify e vuole passare a Plus ha un problema diverso e più piccolo.

Ogni sezione risponde a una di queste paure: il problema (i tre segnali), il processo (come si migra senza fermare
le vendite), la prova (partner Shopify Plus, brand seguiti, un caso reale), le FAQ (le obiezioni più frequenti),
e infine il form. I contenuti della sezione "Perché Webgas" vengono dal sito webgas.net. I quattro passi del
processo sono la pratica standard di una migrazione, non un copy preso dal sito.

### La struttura della pagina

Sopra la piega ci sono solo il messaggio principale e il pulsante che porta al form. Il logo in header non è un link:
in una landing di conversione l'unica uscita deve essere il form. Il pulsante in header resta visibile
durante lo scroll, così la call to action è sempre raggiungibile.

### I campi del form

Cinque campi: nome, email, indirizzo del negozio, piattaforma attuale, ordini al mese (facoltativo).
Il punto di equilibrio è l'indirizzo del negozio: costa poco a chi compila (lo sa a memoria) e qualifica molto
il lead, perché chi riceve la richiesta può guardare il sito prima della call. La piattaforma attuale è un menu
a scelta, così non arrivano testi liberi da interpretare. Gli ordini al mese sono facoltativi perché sono un dato
sensibile per un'azienda e non volevo che fermassero la compilazione.

Non ho chiesto telefono, azienda o messaggio: allungano il form e la call serve proprio a raccogliere il resto.

### Blade e Tailwind, non una SPA

Una pagina con un form non ha bisogno di React o Inertia. Con Blade il form usa il ciclo classico di Laravel:
POST, validazione, redirect con gli errori e i valori inseriti. Meno codice, meno cose che possono rompersi,
e coincide con lo stack che usa Webgas. Tailwind perché è già nello scaffold di Laravel e mi permette di lavorare
sui colori e sugli spazi senza scrivere un file CSS a parte.

### SQLite

È il default di Laravel e non richiede configurazione per chi clona il repository. Per un'installazione reale
basta cambiare la connessione nel `.env`, la migration è la stessa.

### Validazione solo lato server

Il form ha l'attributo `novalidate`: i controlli del browser sono disattivati e la validazione è tutta nella
`StoreLeadRequest`. Così i messaggi di errore sono uno per campo, tutti in italiano e tutti coerenti, e non ci sono
due regole diverse da tenere allineate. Se la validazione fallisce, l'utente torna sul form con i campi
evidenziati e i valori già inseriti.

L'indirizzo del negozio ha due regole: `url` controlla la forma, una regex controlla che il dominio abbia
un'estensione (il perché è tra le domande più sotto). Se l'utente scrive l'indirizzo senza `https://`,
lo aggiungo io prima della validazione.

### Anti spam: honeypot e limite di invii

Ho scelto due protezioni native, senza attrito per l'utente:

- un campo nascosto (`website`) che un utente vero non vede e non compila. Se arriva pieno, la richiesta
  viene ignorata e il bot torna alla landing, non alla pagina di ringraziamento, così non conta come lead;
- un limite di 5 invii al minuto per indirizzo IP con il middleware `throttle` di Laravel. Al sesto tentativo
  l'utente vede un messaggio nel form, non una pagina di errore.

Non ho messo reCAPTCHA: aggiunge attrito, carica script di Google e apre il tema del consenso.

### La mail parte dopo il salvataggio

Il lead viene prima salvato e poi notificato. Se la mail fallisce, il lead è comunque nel database.
L'invio è sincrono: in produzione lo metterei in coda con `queue()` per non far aspettare l'utente.

### Font self-hosted

I font del brand (Instrument Sans e Montserrat) vengono scaricati in fase di build dal plugin Vite di Laravel
e serviti dal progetto. La pagina non fa nessuna richiesta a Google Fonts: nessuna terza parte contattata
prima del consenso ai cookie, e nessun peso del font simulato dal browser.

## Il tracciamento

Google Tag Manager e Google Analytics 4 sono su account creati per la prova. Il container GTM ha due tag:
il tag Google di base su tutte le pagine e un tag evento GA4 che parte sull'evento personalizzato `generate_lead`.
Il container non è pubblicato: il test è fatto in Anteprima, lo screenshot è in `docs/gtm-preview.png`.

### L'evento e il momento in cui scatta

L'evento si chiama `generate_lead`, uno dei nomi consigliati da GA4 per una richiesta di contatto.
Usare il nome standard permette a GA4 di trattarlo nei report come gli altri eventi di conversione
e di segnarlo come evento chiave senza configurazioni in più.

Scatta sulla pagina di ringraziamento (`/grazie`), non al click sul pulsante di invio. Il click non garantisce
niente: la validazione può fallire, il campo anti spam può essere pieno, il salvataggio può andare male.
La pagina di ringraziamento invece si raggiunge solo con il redirect del controller, dopo che il lead è stato
validato e salvato. Contare lì significa contare solo i lead veri.

Per evitare che un refresh di `/grazie` o un accesso diretto all'URL generino un altro evento, il controller
passa i dati in sessione flash con il redirect. La pagina spinge l'evento nel `dataLayer` solo se trova
quel dato, che sparisce alla richiesta successiva.

### I parametri

Insieme all'evento mando due parametri:

- `platform`: la piattaforma attuale scelta nel form;
- `monthly_orders`: la fascia di ordini al mese, se indicata.

Servono a leggere i lead per segmento in GA4: quante richieste arrivano da WooCommerce e quante da Magento,
e di che dimensione. Non mando nome, email o indirizzo del negozio: sono dati personali e le policy di GA4
vietano di inviarli. I dati completi stanno nel database, GA4 serve a capire da quale campagna arrivano
le richieste, non a chi sono.

### Il consenso ai cookie

In locale, con account di test, non ho messo un banner. In produzione servirebbe, perché GA4 scrive
il cookie `_ga` per riconoscere il visitatore tra una pagina e l'altra, e in Italia richiede consenso preventivo.

Lo gestirei con Consent Mode v2 di Google: prima dello snippet GTM, una chiamata che imposta il default a
`denied` per `analytics_storage` e `ad_storage`; il banner, al click su "Accetta", manda l'aggiornamento
a `granted`. I tag GA4 in GTM hanno già il controllo del consenso integrato, quindi l'evento e il `dataLayer`
non cambiano.

Se l'utente rifiuta, il push di `generate_lead` avviene lo stesso ma il tag GA4 non scrive cookie: manda un
ping anonimo, senza client id. Il lead resta contato in aggregato ma non è più attribuibile alla campagna.
Il conteggio vero dei lead non dipende dal consenso: sta nel database. Quello che il rifiuto sacrifica è
l'attribuzione. È anche il motivo per cui un evento mandato dal backend (il bonus del brief, che non ho fatto)
avrebbe senso: conterebbe ogni lead salvato, indipendentemente dal browser.

La pagina non contatta nessuna terza parte prima del consenso: i font sono serviti dal progetto e GTM
è l'unico script esterno.

## Le domande che mi sono fatto

- **Il form in fondo alla pagina o subito nel primo schermo?** L'ho messo in fondo: chi arriva su questa pagina
  ha delle obiezioni e la pagina serve a rispondere prima di chiedere. I pulsanti in header e nell'hero portano
  al form con un'ancora, per chi è già convinto.
- **Quanto stringere la validazione dell'indirizzo del negozio?** La regola `url` da sola accettava `https://negozio`,
  senza estensione. Ho aggiunto una regex che chiede almeno un punto e un'estensione nel dominio, e l'ho ancorata
  all'inizio dopo aver visto che passava anche `www.asd.`. Un controllo più stretto
  richiederebbe una lista di TLD da tenere aggiornata.
- **Il limite di 5 invii al minuto per IP può bloccare qualcuno di legittimo?** In un ufficio con un solo IP
  pubblico, sì, dopo il quinto invio. Per una landing con una richiesta a persona è un compromesso accettabile,
  e l'utente vede un messaggio chiaro invece di un errore.
- **Serve un'informativa privacy sotto il form?** In una landing reale sì, con il link alla policy dell'agenzia.
  Il brief non la chiedeva e non avevo un testo vero da linkare, quindi ho lasciato solo la riga
  "Nessuna newsletter" che dice all'utente cosa succede dopo.
- **La mail mostra i valori grezzi (`woocommerce`, `0-500`) invece delle etichette del form.** Ho lasciato così:
  è una notifica interna, chi la legge conosce i valori, e le etichette avrebbero richiesto una mappa da tenere
  allineata con il form.
- **Il campo anti spam viene controllato prima o dopo la validazione?** Dopo, perché la `FormRequest` viene
  risolta prima del controller. Un bot che compila male gli altri campi riceve gli errori di validazione invece
  del redirect: il risultato è lo stesso, nessun lead salvato.

## Dove ho usato l'AI e come

Ho usato Claude come supporto durante tutto il lavoro, in due modi:

- **per ragionare sulle scelte**: target della pagina, quali campi mettere nel form, dove far scattare l'evento GA4,
  come rispondere alla domanda sul consenso. Le decisioni sono mie, l'AI mi ha aiutato a vedere le alternative
  e i pro e contro di ciascuna;
- **per scrivere il codice con me**: mi facevo spiegare l'approccio riga per riga, poi lo scrivevo io nel progetto
  e lo verificavo nel browser. Alcune cose che ho trovato solo provando: la regex sull'URL che non era ancorata,
  due classi Tailwind in conflitto sul bordo rosso degli input, il messaggio del throttle che usciva come
  pagina 429 invece che nel form.

L'ho usata anche per una revisione finale del progetto rispetto al brief, da cui sono uscite le ultime correzioni
(formattazione con Pint, font self-hosted, parametri dell'evento).

## Cosa ho tagliato e cosa farei con tre giorni in più

Il lavoro mi ha preso circa 14 ore, un po' più delle 12 indicate nel brief: la parte che ha sforato è stata
la configurazione di GTM e GA4, che facevo per la prima volta. Ho tagliato il bonus, l'evento mandato anche
dal backend con il Measurement Protocol di GA4, perché avrebbe allungato ancora i tempi.
È la prima cosa che farei con più tempo: conta ogni lead salvato anche se l'utente ha rifiutato i cookie
o ha uno script blocker, e permette di confrontare i numeri del browser con quelli del server.

Cosa avrei fatto con tre giorni in più:

1. **Evento server-side** con il Measurement Protocol, riusando il `client_id` del cookie `_ga` quando c'è
   per non contare due volte lo stesso lead.
2. **Banner per il consenso** con Consent Mode v2, come descritto sopra.
3. **Invio della mail in coda** con `queue()`, così l'utente non aspetta l'invio.
4. **Form a due colonne su desktop**: oggi la card è stretta e alta, su schermi grandi si può accorciare.
5. **Test automatici** sul form: validazione, honeypot, throttle, salvataggio e mail. Il brief non li chiedeva,
   ma sono il modo per toccare il codice senza rompere quello che funziona.
6. **Informativa privacy** sotto il form con link alla policy.
