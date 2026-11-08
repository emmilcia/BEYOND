<?php
$pageTitle = 'Misje kosmiczne';
require_once __DIR__ . '/includes/header.php';

$programs = [
    [
        'name' => 'Artemis',
        'type' => 'Załogowe loty na Księżyc',
        'description' => 'Program NASA rozwijający loty załogowe w okolice Księżyca i przygotowujący kolejne wyprawy na jego powierzchnię.',
        'image' => 'images/missions/artemis-sls.jpg',
        'image_alt' => 'Rakieta SLS i statek Orion na stanowisku startowym',
        'image_credit' => 'NASA/Eric Bordelon',
        'missions' => [
            ['name' => 'Artemis I', 'year' => '2022', 'description' => 'Bezzałogowy lot testowy rakiety SLS i statku Orion. Orion okrążył Księżyc i wrócił na Ziemię, sprawdzając systemy potrzebne do przyszłych lotów załogowych.'],
            ['name' => 'Artemis III', 'year' => 'Plan: 2027', 'description' => 'Według obecnego planu misja ma przetestować na niskiej orbicie okołoziemskiej spotkanie i dokowanie Oriona z komercyjnymi lądownikami.'],
            ['name' => 'Artemis V', 'year' => 'Plan: 2028', 'description' => 'Kolejna planowana wyprawa na powierzchnię Księżyca. Program zakłada kontynuowanie misji załogowych i stopniową rozbudowę infrastruktury lunarnej.'],
            ['name' => 'Artemis II', 'year' => '2026', 'description' => 'Pierwszy załogowy lot Oriona wokół Księżyca. Czteroosobowa załoga odbyła około dziesięciodniową wyprawę i przetestowała systemy statku w przestrzeni księżycowej.'],
            ['name' => 'Artemis IV', 'year' => 'Plan: 2028', 'description' => 'NASA planuje wtedy pierwsze lądowanie załogi na Księżycu w programie Artemis, z użyciem statku Orion i komercyjnego lądownika.'],
        ]
    ],
    [
        'name' => 'Apollo',
        'type' => 'Pierwsze wyprawy na Księżyc',
        'description' => 'Program NASA, który w latach 60. i 70. XX wieku wysłał astronautów na orbitę Księżyca i na jego powierzchnię.',
        'image' => 'images/missions/apollo-moonwalk.jpg',
        'image_alt' => 'Astronauta Apollo 11 na powierzchni Księżyca obok amerykańskiej flagi',
        'image_credit' => 'NASA',
        'missions' => [
            ['name' => 'Apollo 8', 'year' => '1968', 'description' => 'Pierwsza załogowa misja, która okrążyła Księżyc. Astronauci wykonali dziesięć orbit i sfotografowali powierzchnię z bliska.'],
            ['name' => 'Apollo 11', 'year' => '1969', 'description' => 'Neil Armstrong i Buzz Aldrin jako pierwsi ludzie wylądowali na Księżycu. Michael Collins pozostał na orbicie w module dowodzenia.'],
            ['name' => 'Apollo 13', 'year' => '1970', 'description' => 'Po awarii zbiornika tlenu lądowanie odwołano. Załoga wykorzystała moduł księżycowy jako łódź ratunkową i bezpiecznie wróciła na Ziemię.'],
            ['name' => 'Apollo 17', 'year' => '1972', 'description' => 'Ostatnie jak dotąd lądowanie ludzi na Księżycu. Astronauta-geolog Harrison Schmitt pomagał badać i pobierać próbki skał.'],
        ]
    ],
    [
        'name' => 'Badanie Marsa',
        'type' => 'Lądowniki i łaziki',
        'description' => 'Kolejne generacje misji badają klimat, geologię i ślady dawnej wody na Czerwonej Planecie.',
        'image' => 'images/missions/mars-jezero-panorama.jpg',
        'image_alt' => 'Panorama skalistej delty w kraterze Jezero na Marsie',
        'image_credit' => 'NASA/JPL-Caltech/ASU/MSSS',
        'missions' => [
            ['name' => 'Viking 1 i 2', 'year' => '1976', 'description' => 'Pierwsze amerykańskie lądowniki, które z powodzeniem prowadziły długotrwałe badania na powierzchni Marsa. Wykonały też eksperymenty szukające oznak życia.'],
            ['name' => 'Mars Pathfinder i Sojourner', 'year' => '1997', 'description' => 'Lądownik Pathfinder dostarczył Sojournera, pierwszego łazika działającego na innej planecie. Misja sprawdziła też tańszy sposób lądowania z użyciem poduszek powietrznych.'],
            ['name' => 'Spirit i Opportunity', 'year' => '2004', 'description' => 'Dwa łaziki badały skały i ślady dawnej obecności wody. Oba pracowały znacznie dłużej, niż zakładano na początku misji.'],
            ['name' => 'Curiosity', 'year' => '2012', 'description' => 'Łazik w kraterze Gale bada skały i klimat, by ustalić, czy Mars miał kiedyś warunki sprzyjające życiu mikroorganizmów.'],
            ['name' => 'Perseverance i Ingenuity', 'year' => '2021', 'description' => 'Perseverance bada deltę dawnej rzeki w kraterze Jezero i zbiera próbki. Ingenuity był pierwszym napędzanym lotem pojazdem, który latał na innej planecie.'],
        ]
    ],
    [
        'name' => 'Dalekie sondy',
        'type' => 'Planety zewnętrzne i granice heliosfery',
        'description' => 'Sondy, które odwiedziły odległe światy, a później kontynuowały podróż poza obszar wiatru słonecznego.',
        'image' => 'images/missions/voyager-concept.jpg',
        'image_alt' => 'Wizja artystyczna sondy Voyager w przestrzeni międzygwiazdowej',
        'image_credit' => 'NASA/JPL-Caltech',
        'missions' => [
            ['name' => 'Voyager 1', 'year' => '1977', 'description' => 'Po zbadaniu Jowisza i Saturna sonda poleciała dalej i w 2012 roku przekroczyła heliopauzę, granicę heliosfery. Nadal przesyła dane z przestrzeni międzygwiazdowej.'],
            ['name' => 'Voyager 2', 'year' => '1977', 'description' => 'Jedyna sonda, która z bliska odwiedziła Urana i Neptuna. Heliopauzę przekroczyła w 2018 roku.'],
            ['name' => 'Cassini-Huygens', 'year' => '1997–2017', 'description' => 'Cassini badała Saturna i jego pierścienie, a lądownik Huygens osiadł na Tytanie w 2005 roku. Obserwacje Enceladusa ujawniły pióropusze lodu i pary wodnej.'],
            ['name' => 'Juno', 'year' => 'Od 2011', 'description' => 'Sonda NASA bada Jowisza z orbity, mierząc jego pole grawitacyjne i magnetyczne oraz obserwując atmosferę i zorze polarne.'],
            ['name' => 'New Horizons', 'year' => 'Od 2006', 'description' => 'W 2015 roku wykonała pierwsze bliskie zdjęcia Plutona. Cztery lata później przeleciała obok obiektu Arrokoth w Pasie Kuipera.'],
            ['name' => 'Europa Clipper', 'year' => 'Od 2024', 'description' => 'Sonda zmierza do układu Jowisza, by podczas serii przelotów zbadać lodową skorupę Europy i ocenić warunki panujące pod jej powierzchnią.'],
        ]
    ],
    [
        'name' => 'Kosmiczne teleskopy',
        'type' => 'Obserwatoria poza atmosferą',
        'description' => 'Teleskopy na orbicie obserwują kosmos w różnych zakresach światła, których nie da się w pełni zbadać z powierzchni Ziemi.',
        'image' => 'images/articles/star-formation-carina.jpg',
        'image_alt' => 'Obszar powstawania gwiazd w Mgławicy Carina sfotografowany przez teleskop Jamesa Webba',
        'image_credit' => 'NASA/ESA/CSA/STScI',
        'missions' => [
            ['name' => 'Hubble', 'year' => 'Od 1990', 'description' => 'Teleskop obserwuje głównie światło widzialne i ultrafiolet. Jego zdjęcia pomogły badać odległe galaktyki, mgławice i tempo rozszerzania się Wszechświata.'],
            ['name' => 'Chandra', 'year' => 'Od 1999', 'description' => 'Obserwatorium rentgenowskie bada bardzo gorące i energetyczne obiekty, między innymi pozostałości supernowych, gwiazdy neutronowe i czarne dziury.'],
            ['name' => 'Gaia', 'year' => 'Od 2013', 'description' => 'Misja ESA mierzy położenia, odległości i ruchy gwiazd. Z tych danych powstaje precyzyjna trójwymiarowa mapa Drogi Mlecznej.'],
            ['name' => 'James Webb', 'year' => 'Od 2021', 'description' => 'Teleskop podczerwony obserwuje wczesne galaktyki, obszary narodzin gwiazd i atmosfery egzoplanet. Działa w punkcie L2, około 1,5 miliona kilometrów od Ziemi.'],
        ]
    ],
    [
        'name' => 'Asteroidy i komety',
        'type' => 'Małe ciała Układu Słonecznego',
        'description' => 'Próbki i bliskie obserwacje małych ciał pomagają odtworzyć początki planet oraz testować sposoby ochrony Ziemi.',
        'image' => 'images/articles/asteroid-bennu.jpg',
        'image_alt' => 'Głazista powierzchnia asteroidy Bennu sfotografowana przez OSIRIS-REx',
        'image_credit' => 'NASA/Goddard/University of Arizona',
        'missions' => [
            ['name' => 'Rosetta i Philae', 'year' => '2004–2016', 'description' => 'Rosetta towarzyszyła komecie 67P przez ponad dwa lata. Lądownik Philae jako pierwszy osiadł na jądrze komety i wykonał pomiary na jej powierzchni.'],
            ['name' => 'Hayabusa2', 'year' => '2014–2020', 'description' => 'Japońska sonda pobrała próbki z asteroidy Ryugu i dostarczyła je na Ziemię. Materiał pozwala badać substancje obecne we wczesnym Układzie Słonecznym.'],
            ['name' => 'OSIRIS-REx', 'year' => '2016–2023', 'description' => 'Sonda pobrała materiał z asteroidy Bennu i zwróciła kapsułę z próbkami na Ziemię. Po zakończeniu głównego zadania kontynuuje podróż jako OSIRIS-APEX.'],
            ['name' => 'DART', 'year' => '2022', 'description' => 'NASA celowo uderzyła sondą w księżyc asteroidy Dimorphos. Eksperyment zmienił jego orbitę i sprawdził metodę odchylania potencjalnie niebezpiecznych asteroid.'],
        ]
    ],
    [
        'name' => 'Stacje orbitalne',
        'type' => 'Długotrwała obecność ludzi w kosmosie',
        'description' => 'Stacje pozwalają prowadzić badania przez miesiące i lata, w warunkach mikrograwitacji.',
        'image' => 'images/missions/iss-orbit.jpg',
        'image_alt' => 'Międzynarodowa Stacja Kosmiczna na tle Ziemi',
        'image_credit' => 'NASA',
        'image_position' => 'center bottom',
        'missions' => [
            ['name' => 'Mir', 'year' => '1986–2001', 'description' => 'Radziecka, a później rosyjska stacja orbitalna. Umożliwiła długie pobyty astronautów i dostarczyła doświadczeń wykorzystanych przy budowie ISS.'],
            ['name' => 'Międzynarodowa Stacja Kosmiczna', 'year' => 'Od 1998', 'description' => 'Wspólny projekt wielu agencji kosmicznych. Załogi prowadzą tam badania naukowe i testują technologie potrzebne do dalszych wypraw.'],
            ['name' => 'Tiangong', 'year' => 'Od 2021', 'description' => 'Chińska stacja kosmiczna z załogowymi rotacjami i laboratoriami do badań w mikrograwitacji. Jej modułowa konstrukcja pozwala rozbudowywać kompleks.'],
        ]
    ]
];
?>

<div class="container">
    <section class="mission-hero" aria-labelledby="missions-title">
        <div class="mission-hero-copy">
            <div class="mission-eyebrow">Programy i wyprawy</div>
            <h1 id="missions-title">Misje kosmiczne</h1>
            <p>Od pierwszych lotów na Księżyc po sondy badające odległe światy.</p>
        </div>
    </section>

    <section class="mission-programs" aria-label="Programy kosmiczne">
        <?php foreach ($programs as $index => $program): ?>
            <details class="mission-program" <?= $index === 0 ? 'open' : '' ?>>
                <summary>
                    <span class="program-heading">
                        <span class="program-type"><?= htmlspecialchars($program['type']) ?></span>
                        <span class="program-name"><?= htmlspecialchars($program['name']) ?></span>
                        <span class="program-description"><?= htmlspecialchars($program['description']) ?></span>
                    </span>
                    <span class="program-toggle" aria-hidden="true"></span>
                </summary>

                <figure class="program-photo">
                    <img src="<?= htmlspecialchars($program['image']) ?>" alt="<?= htmlspecialchars($program['image_alt']) ?>" style="object-position: <?= htmlspecialchars($program['image_position'] ?? 'center') ?>;" loading="lazy">
                    <figcaption><?= htmlspecialchars($program['image_credit']) ?></figcaption>
                </figure>

                <div class="mission-list" style="--mission-rows: <?= (int) ceil(count($program['missions']) / 2) ?>;">
                    <?php foreach ($program['missions'] as $mission): ?>
                        <article class="mission-item">
                            <div class="mission-item-heading">
                                <h3><?= htmlspecialchars($mission['name']) ?></h3>
                                <span><?= htmlspecialchars($mission['year']) ?></span>
                            </div>
                            <p><?= htmlspecialchars($mission['description']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </details>
        <?php endforeach; ?>
    </section>
</div>

<style>
    .mission-hero {
        display: flex;
        min-height: 190px;
        align-items: center;
        margin: 18px 0 20px;
    }

    .mission-hero-copy {
        max-width: 700px;
        padding: 22px 0;
    }

    .mission-eyebrow,
    .program-type {
        color: var(--neon-cyan);
        font-size: 0.72rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .mission-hero h1 {
        margin: 10px 0;
        color: var(--text-white);
        font-family: var(--font-heading);
        font-size: 2.7rem;
        line-height: 1.15;
    }

    .mission-hero p {
        max-width: 54ch;
        margin: 0;
        color: rgba(255,255,255,0.84);
        font-size: 1rem;
        line-height: 1.7;
    }

    .mission-programs {
        display: grid;
        gap: 12px;
        margin-bottom: 48px;
    }

    .mission-program {
        overflow: hidden;
        border: 1px solid var(--card-border);
        border-radius: 6px;
        background: rgba(10, 14, 24, 0.88);
    }

    .mission-program[open] {
        border-color: rgba(0, 240, 255, 0.28);
    }

    .mission-program summary {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 28px;
        align-items: center;
        gap: 24px;
        padding: 22px 26px;
        cursor: pointer;
        list-style: none;
    }

    .mission-program summary::-webkit-details-marker {
        display: none;
    }

    .mission-program summary:focus-visible {
        outline: 2px solid var(--neon-cyan);
        outline-offset: -3px;
    }

    .program-heading {
        display: grid;
        gap: 6px;
    }

    .program-photo {
        position: relative;
        height: clamp(280px, 32vw, 420px);
        margin: 0 26px 8px;
        overflow: hidden;
        border-radius: 4px;
        background: rgba(255,255,255,0.04);
    }

    .program-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .program-photo figcaption {
        position: absolute;
        right: 4px;
        bottom: 4px;
        padding: 2px 4px;
        color: rgba(255,255,255,0.9);
        background: rgba(0,0,0,0.65);
        font-size: 0.58rem;
    }

    .program-name {
        color: var(--text-white);
        font-family: var(--font-heading);
        font-size: 1.35rem;
        font-weight: 700;
    }

    .program-description {
        color: var(--text-secondary);
        font-size: 0.92rem;
        line-height: 1.6;
    }

    .program-toggle {
        flex: 0 0 28px;
        color: var(--neon-cyan);
        font-size: 1.6rem;
        line-height: 1;
        text-align: center;
    }

    .program-toggle::before {
        content: '+';
    }

    .mission-program[open] .program-toggle::before {
        content: '\2212';
    }

    .mission-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        grid-template-rows: repeat(var(--mission-rows), minmax(0, auto));
        grid-auto-flow: column;
        gap: 0 32px;
        padding: 0 26px 18px;
    }

    .mission-item {
        padding: 18px 0;
        border-top: 1px solid rgba(255,255,255,0.08);
    }

    .mission-item-heading {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        gap: 14px;
        margin-bottom: 8px;
    }

    .mission-item h3 {
        margin: 0;
        color: var(--text-white);
        font-family: var(--font-heading);
        font-size: 1rem;
    }

    .mission-item-heading span {
        flex: 0 0 auto;
        color: var(--text-muted);
        font-size: 0.75rem;
    }

    .mission-item p {
        margin: 0;
        color: var(--text-secondary);
        font-size: 0.9rem;
        line-height: 1.7;
    }

    @media (max-width: 700px) {
        .mission-hero-copy {
            padding: 20px 0;
        }

        .mission-hero h1 {
            font-size: 2.1rem;
        }

        .mission-list {
            grid-template-columns: minmax(0, 1fr);
            grid-template-rows: none;
            grid-auto-flow: row;
            padding-right: 22px;
            padding-left: 22px;
        }

        .program-photo {
            height: 240px;
            margin-right: 18px;
            margin-left: 18px;
        }

        .mission-program summary {
            grid-template-columns: minmax(0, 1fr) 20px;
            gap: 14px;
            padding: 16px 18px;
        }
    }
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>