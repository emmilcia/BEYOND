<?php
$pageTitle = 'Ciekawostki';

// Podstawowa lista faktów; szczegółowe rozwinięcia poniżej odpowiadają jej pozycjom.
$facts = [
    [
        'category' => 'Słońce',
        'text' => 'Słońce skupia około 99,86% masy całego Układu Słonecznego. Wszystkie planety, księżyce i mniejsze ciała razem ważą zaledwie ułamek reszty.',
    ],
    [
        'category' => 'Słońce',
        'text' => 'Światło ze Słońca dociera do Ziemi po około 8 minutach i 20 sekundach. Gdy patrzymy na Słońce, widzimy je takim, jakie było kilka minut temu.',
    ],
    [
        'category' => 'Merkury',
        'text' => 'Na biegunach Merkurego znajdują się kratery, których dna nigdy nie oświetla Słońce. W tych zimnych pułapkach wykryto wodny lód.',
    ],
    [
        'category' => 'Wenus',
        'text' => 'Doba gwiazdowa na Wenus trwa dłużej niż jej rok: obrót planety zajmuje około 243 dni ziemskich, a obieg wokół Słońca około 225 dni.',
    ],
    [
        'category' => 'Mars',
        'text' => 'Olympus Mons na Marsie jest najwyższym znanym wulkanem w Układzie Słonecznym. Od podnóża do szczytu ma około 22 kilometrów.',
    ],
    [
        'category' => 'Jowisz',
        'text' => 'Wielka Czerwona Plama Jowisza to ogromny wir atmosferyczny, obserwowany od co najmniej XIX wieku. Jest tak rozległy, że zmieściłaby się w nim Ziemia.',
    ],
    [
        'category' => 'Jowisz',
        'text' => 'Ganimedes, księżyc Jowisza, jest większy od Merkurego. To największy księżyc w całym Układzie Słonecznym.',
    ],
    [
        'category' => 'Europa',
        'text' => 'Pod lodową skorupą Europy, księżyca Jowisza, może znajdować się słony ocean. To obiecujące miejsce do badań, ale nie znaleziono tam dowodów na życie.',
    ],
    [
        'category' => 'Saturn',
        'text' => 'Średnia gęstość Saturna jest mniejsza niż gęstość wody. Często mówi się, że planeta unosiłaby się w ogromnym oceanie, choć taki zbiornik oczywiście nie istnieje.',
    ],
    [
        'category' => 'Księżyc',
        'text' => 'Księżyc oddala się od Ziemi średnio o około 3,8 centymetra rocznie. Naukowcy mierzą tę zmianę, odbijając impulsy laserowe od reflektorów pozostawionych na jego powierzchni.',
    ],
    [
        'category' => 'Księżyc',
        'text' => 'Tak zwana niewidoczna strona Księżyca nie jest wiecznie ciemna. Otrzymuje tyle samo światła słonecznego co strona zwrócona ku Ziemi, tylko nie widzimy jej z naszej planety.',
    ],
    [
        'category' => 'Czarne dziury',
        'text' => 'W centrum Drogi Mlecznej znajduje się Sagittarius A*, supermasywna czarna dziura o masie około czterech milionów Słońc.',
    ],
    [
        'category' => 'Czarne dziury',
        'text' => 'Czarna dziura nie zasysa wszystkiego z dowolnej odległości. Gdyby Słońce zastąpić czarną dziurą o tej samej masie, Ziemia nadal krążyłaby po podobnej orbicie.',
    ],
    [
        'category' => 'Wszechświat',
        'text' => 'Obserwowalny Wszechświat ma około 93 miliardów lat świetlnych średnicy. To nie wiek kosmosu: przestrzeń rozszerzała się, gdy światło podróżowało do nas.',
    ],
    [
        'category' => 'Kosmiczne misje',
        'text' => 'Międzynarodowa Stacja Kosmiczna okrąża Ziemię mniej więcej co 90 minut. Załoga może więc zobaczyć około 16 wschodów i zachodów Słońca w ciągu doby.',
    ],
    [
        'category' => 'Teleskopy',
        'text' => 'Teleskop Jamesa Webba obserwuje głównie podczerwień. Dzięki temu może badać ciepłe obiekty i światło odległych galaktyk rozciągnięte przez rozszerzanie się Wszechświata.',
    ],
    [
        'category' => 'Droga Mleczna',
        'text' => 'Gwiazdy, które z Ziemi wyglądają jak sąsiadki na jednej linii, często dzielą ogromne odległości. Gwiazdozbiory to wzory na naszym niebie, a nie zwarte grupy gwiazd.',
    ],
    [
        'category' => 'Egzoplanety',
        'text' => 'Skład atmosfery odległej planety można badać, analizując światło jej gwiazdy, które przechodzi przez atmosferę podczas tranzytu.',
    ],
    [
        'category' => 'Słońce',
        'text' => 'W jądrze Słońca około 600 milionów ton wodoru łączy się w hel w każdej sekundzie. Niewielka część masy zamienia się przy tym w energię.',
    ],
    [
        'category' => 'Neptun',
        'text' => 'Neptun został najpierw przewidziany matematycznie. Astronomowie wyliczyli, gdzie może się znajdować, analizując zaburzenia orbity Urana, a potem odnaleźli go na niebie.',
    ]
];

// Rozwinięcia są dopisywane do pierwszych 20 faktów według ich indeksów.
$factDetails = [
    'Słońce zawiera niemal całą materię, która skupiła się podczas powstawania naszego układu. Sama Ziemia stanowi zaledwie maleńką część jego masy.',
    'Odległość od Słońca wynosi średnio około 150 milionów kilometrów, czyli jedną jednostkę astronomiczną. Mimo tej drogi światło pokonuje ją szybciej niż jakikolwiek znany nam obiekt.',
    'To zaskakujące, bo Merkury leży blisko Słońca, ale jego powierzchnia jest wystawiona na skrajne temperatury. Lód przetrwał w miejscach osłoniętych od bezpośredniego światła.',
    'Wenus obraca się w kierunku przeciwnym do większości planet. Z jej powierzchni Słońce wschodziłoby na zachodzie i zachodziło na wschodzie.',
    'To wulkan tarczowy o łagodnych zboczach, rozbudowywany przez liczne wylewy lawy. Na Ziemi taki obiekt byłby znacznie niższy ze względu na silniejszą grawitację i aktywną tektonikę.',
    'To antycyklon, czyli rozległy układ wysokiego ciśnienia w atmosferze. Jego rozmiar i kolor zmieniają się, a wiatr w obrębie plamy osiąga setki kilometrów na godzinę.',
    'Ganimedes jest też jedynym znanym księżycem z własnym polem magnetycznym. Prawdopodobnie powstaje ono w jego ciekłym, metalicznym jądrze.',
    'Wniosek o oceanie wspierają między innymi pomiary pola magnetycznego i wygląd lodowej skorupy. Europa Clipper ma zbadać, jak gruby jest lód i co może znajdować się pod nim.',
    'To porównanie jest tylko ciekawostką o gęstości, nie opisem realnego oceanu. Saturn ma potężną atmosferę i głębokie warstwy gazu, więc nie dałoby się go po prostu położyć na wodzie.',
    'Grawitacja Księżyca powoduje pływy oceanów, a tarcie pływowe przenosi część energii obrotu Ziemi na orbitę Księżyca. W efekcie ziemskie doby wydłużają się bardzo powoli.',
    'Księżyc obraca się wokół własnej osi dokładnie w takim tempie, w jakim obiega Ziemię. Dlatego z naszej planety widzimy prawie zawsze tę samą półkulę.',
    'Sagittarius A* leży około 26 tysięcy lat świetlnych od nas, w kierunku gwiazdozbioru Strzelca. W 2022 roku międzynarodowy zespół opublikował pierwszy obraz jego cienia.',
    'Dopiero po przekroczeniu horyzontu zdarzeń nie może uciec nawet światło. Z daleka obiekt o tej samej masie przyciągałby Ziemię tak samo jak Słońce.',
    'Wiek kosmosu szacuje się na około 13,8 miliarda lat, ale obserwowalny obszar jest znacznie szerszy niż 27,6 miliarda lat świetlnych. W czasie podróży światła sama przestrzeń zdążyła się rozszerzyć.',
    'Stacja porusza się z prędkością około 28 tysięcy kilometrów na godzinę i znajduje się mniej więcej 400 kilometrów nad Ziemią. Jej orbita jest stale korygowana, bo szczątkowa atmosfera stopniowo ją spowalnia.',
    'Podczerwień pozwala badać chłodniejsze obiekty i przenikać przez część kosmicznego pyłu. Webb ma segmentowe zwierciadło główne o średnicy 6,5 metra i osłonę przeciwsłoneczną wielkości kortu tenisowego.',
    'Niektóre gwiazdy danego wzoru są setki lat świetlnych od innych. Wzory pomagają orientować się na niebie, ale nie oznaczają, że gwiazdy tworzą fizyczną grupę.',
    'Podczas tranzytu planeta na chwilę przyciemnia światło gwiazdy. Jeśli zmierzyć dokładnie widmo tego światła, można szukać śladów gazów w atmosferze planety.',
    'W każdej sekundzie zachodzi olbrzymia liczba reakcji, a około czterech milionów ton masy zamienia się w energię. To ta energia dociera do nas jako światło i ciepło.',
    'Neptuna zaobserwowano w 1846 roku, po obliczeniach niezależnie wykonanych przez Urbaina Le Verriera i Johna Coucha Adamsa. Jego położenie potwierdził teleskop Johanna Gallego.',
];

if (count($factDetails) !== count($facts)) {
    throw new LogicException('Liczba rozwinięć musi odpowiadać liczbie faktów.');
}

foreach ($facts as $index => &$fact) {
    $fact['text'] .= ' ' . $factDetails[$index];
}
unset($fact);

$facts = array_merge($facts, [
    [
        'category' => 'Uran',
        'text' => 'Oś obrotu Urana jest nachylona o około 98 stopni, więc planeta obraca się niemal na boku. Każdy biegun przez mniej więcej 21 lat pozostaje zwrócony ku Słońcu, a potem zapada w długi okres nocy.',
    ],
    [
        'category' => 'Io',
        'text' => 'Io, księżyc Jowisza, jest najbardziej aktywnym wulkanicznie ciałem w Układzie Słonecznym. Grawitacyjne oddziaływanie Jowisza i sąsiednich księżyców nieustannie ściska jego wnętrze i dostarcza energii do erupcji.',
    ],
    [
        'category' => 'Tytan',
        'text' => 'Na Tytanie, dużym księżycu Saturna, pada deszcz ciekłego metanu i etanu. Związki te tworzą rzeki oraz jeziora na powierzchni, gdzie temperatura jest znacznie niższa niż na Ziemi.',
    ],
    [
        'category' => 'Komety',
        'text' => 'Warkocz komety jest skierowany w przybliżeniu od Słońca, niezależnie od kierunku, w którym leci jądro. Pył wypycha ciśnienie promieniowania, a naładowane gazy odchyla wiatr słoneczny.',
    ],
    [
        'category' => 'Astronomia',
        'text' => 'Rok świetlny to jednostka odległości, a nie czasu. Światło pokonuje w rok około 9,46 biliona kilometrów.',
    ],
    [
        'category' => 'Gwiazdy',
        'text' => 'Gwiazda neutronowa może mieć masę większą od Słońca, a jednocześnie średnicę wynoszącą zaledwie około 20 kilometrów. To pozostałość po jądrze masywnej gwiazdy, która wybuchła jako supernowa.',
    ],
    [
        'category' => 'Pulsary',
        'text' => 'Pulsar to szybko wirująca gwiazda neutronowa, której wiązki promieniowania omiatają przestrzeń niczym światło latarni. Gdy wiązka co obrót skieruje się ku Ziemi, teleskopy rejestrują regularny impuls.',
    ],
    [
        'category' => 'Słońce',
        'text' => 'Zewnętrzna atmosfera Słońca, korona, ma temperaturę przekraczającą milion stopni, choć widoczna powierzchnia ma około 5 500 stopni. Naukowcy nadal badają, w jaki sposób energia ogrzewa koronę do tak wysokiej temperatury.',
    ],
    [
        'category' => 'Ziemia',
        'text' => 'Meteoroid to mały obiekt przemierzający przestrzeń, a meteor to świetlny ślad, który widzimy, gdy obiekt wpada w atmosferę. Jeśli fragment przetrwa lot i spadnie na powierzchnię, nazywa się meteorytem.',
    ],
    [
        'category' => 'Merkury',
        'text' => 'Doba słoneczna na Merkurym trwa około 176 dni ziemskich, mimo że pełny obrót planety wokół osi zajmuje około 59 dni. Szczególny rezonans obrotu i obiegu sprawia, że wschód Słońca trwa tam niezwykle długo.',
    ],
    [
        'category' => 'Saturn',
        'text' => 'Pierścienie Saturna składają się głównie z lodu wodnego, od drobnych ziaren po większe bryły. Są bardzo szerokie, ale w wielu miejscach mają zaledwie dziesiątki metrów grubości.',
    ],
]);

$today = date('Y-m-d');
$dailyIndex = intdiv((int) strtotime($today), 86400) % count($facts);
$dailyFact = $facts[$dailyIndex];
$randomIndices = array_values(array_diff(range(0, count($facts) - 1), [$dailyIndex]));
$currentIndex = $randomIndices[random_int(0, count($randomIndices) - 1)];
$currentFact = $facts[$currentIndex];
require_once __DIR__ . '/includes/header.php';
?>

<div class="container">
    <section class="page-hero" style="margin-bottom: 24px;">
        <div class="dashboard-topbar" style="margin-bottom: 0;">
            <div class="status-indicator">
                <span class="pulse-dot"></span>
                <span>Ciekawostki</span>
            </div>
            <div class="sys-time">Kosmos w pigułce</div>
        </div>
    </section>

    <section class="dash-card" aria-labelledby="daily-fact-title" style="max-width: 1080px; margin: 0 auto 34px; padding: 28px clamp(22px, 5vw, 42px); border-left: 3px solid var(--neon-cyan); background: linear-gradient(135deg, rgba(10,14,24,0.98), rgba(18,18,30,0.96));">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap; margin-bottom: 18px;">
            <h2 id="daily-fact-title" style="margin: 0; color: var(--neon-cyan); font-family: var(--font-heading); font-size: 0.9rem; text-transform: uppercase;">Ciekawostka dnia</h2>
            <time datetime="<?= htmlspecialchars($today) ?>" style="color: var(--text-muted); font-size: 0.8rem;">
                <?= htmlspecialchars(date('d.m.Y')) ?>
            </time>
        </div>
        <div style="margin-bottom: 12px; color: var(--text-muted); font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase;">
            <?= htmlspecialchars($dailyFact['category']) ?>
        </div>
        <p style="max-width: 75ch; margin: 0; color: var(--text-white); font-family: var(--font-heading); font-size: 1.2rem; line-height: 1.75;">
            <?= htmlspecialchars($dailyFact['text']) ?>
        </p>
    </section>

    <section aria-labelledby="facts-title" style="max-width: 1080px; margin: 0 auto 48px;">
        <div style="margin-bottom: 20px;">
            <h2 id="facts-title" style="margin: 0 0 8px; color: var(--text-white); font-family: var(--font-heading); font-size: 1.7rem;">Wylosuj ciekawostkę</h2>
        </div>

        <article class="dash-card fact-card" style="padding: 0; overflow: hidden; border: 1px solid rgba(255,255,255,0.08); background: linear-gradient(135deg, rgba(10,14,24,0.98), rgba(18,18,30,0.96));">
            <div class="fact-layout" style="min-height: 320px;">
                <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; max-width: 760px; min-height: 320px; margin: 0; padding: 32px clamp(22px, 3vw, 36px);">
                    <div id="fact-category" style="margin-bottom: 18px; color: var(--neon-cyan); font-size: 0.75rem; letter-spacing: 0.12em; text-transform: uppercase;">
                        <?= htmlspecialchars($currentFact['category']) ?>
                    </div>
                    <p id="fact-text" aria-live="polite" style="min-height: 150px; margin: 0 0 28px; color: var(--text-white); font-family: var(--font-heading); font-size: 1.35rem; line-height: 1.65;">
                        <?= htmlspecialchars($currentFact['text']) ?>
                    </p>
                    <div style="display: flex; align-items: center; gap: 18px; flex-wrap: wrap;">
                        <button id="draw-fact" type="button" style="padding: 12px 18px; border: 1px solid var(--neon-cyan); border-radius: 4px; background: rgba(0,240,255,0.12); color: var(--text-white); font: inherit; cursor: pointer;">
                            Losuj kolejną
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </section>
</div>

<style>
    .fact-card {
        transition: border-color 180ms ease, transform 180ms ease;
    }

    .fact-card.is-changing {
        transform: translateY(3px);
        border-color: rgba(0, 240, 255, 0.35) !important;
    }

    #draw-fact:hover {
        background: rgba(0, 240, 255, 0.2) !important;
    }

    #draw-fact:focus-visible {
        outline: 2px solid var(--text-white);
        outline-offset: 3px;
    }

    @media (max-width: 700px) {
        #fact-text {
            min-height: 0 !important;
        }
    }
</style>

<script>
    const facts = <?= json_encode($facts, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
    const dailyIndex = <?= $dailyIndex ?>;
    let currentIndex = <?= $currentIndex ?>;
    const factCard = document.querySelector('.fact-card');

    document.getElementById('draw-fact').addEventListener('click', () => {
        const availableIndices = facts
            .map((_, index) => index)
            .filter((index) => index !== currentIndex && index !== dailyIndex);
        currentIndex = availableIndices[Math.floor(Math.random() * availableIndices.length)];
        const fact = facts[currentIndex];

        factCard.classList.add('is-changing');
        document.getElementById('fact-category').textContent = fact.category;
        document.getElementById('fact-text').textContent = fact.text;
        window.setTimeout(() => factCard.classList.remove('is-changing'), 180);
    });
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>