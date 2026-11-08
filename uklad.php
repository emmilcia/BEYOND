<?php
/**
 * BEYOND — Układ Słoneczny (uklad.php)
 * Prezentacja Słońca i 8 oficjalnych planet z danymi astronomicznymi i filtrowaniem
 */

$pageTitle = 'Układ Słoneczny — Eksploracja Planet';
require_once __DIR__ . '/includes/header.php';

// Kompletna baza danych Słońca i 8 planet Układu Słonecznego
$celestialBodies = [
    [
        'id' => 'sun',
        'name' => 'Słońce',
        'symbol' => '☉',
        'order' => 'Centrum Układu',
        'category' => 'star',
        'category_name' => 'Gwiazda centralna',
        'badge_class' => 'badge-supernova',
        'image' => 'images/planets/sun.jpg',
        'color' => '#ffaa00',
        'diameter' => '1 392 700 km',
        'diameter_rel' => '109x Ziemia',
        'distance_sun' => '0 AU (0 km)',
        'orbital_period' => '230 mln lat (wokół centrum Galaktyki)',
        'moons' => 'Brak (utrzymuje 8 planet)',
        'temp' => '5 500 °C / 15 mln °C',
        'day_length' => '~27 dni ziemskich',
        'gravity' => '274 m/s² (28G)',
        'atmosphere' => 'Wodór (73%), Hel (25%), tlen, węgiel',
        'missions' => 'SOHO, SDO, Parker Solar Probe, Solar Orbiter',
        'fun_fact' => 'Słońce stanowi aż 99.86% całej masy Układu Słonecznego. W każdej sekundzie przetapia 600 milionów ton wodoru w hel.'
    ],
    [
        'id' => 'mercury',
        'name' => 'Merkury',
        'symbol' => '☿',
        'order' => 'I planeta od Słońca',
        'category' => 'rocky',
        'category_name' => 'Planeta skalista',
        'badge_class' => 'badge-galaxy',
        'image' => 'images/planets/mercury.jpg',
        'color' => '#94a3b8',
        'diameter' => '4 879 km',
        'diameter_rel' => '0.38x Ziemia',
        'distance_sun' => '0.39 AU (57.9 mln km)',
        'orbital_period' => '88 dni ziemskich',
        'moons' => '0',
        'temp' => 'od -180°C do +430°C',
        'day_length' => '59 dni ziemskich',
        'gravity' => '3.7 m/s² (0.38G)',
        'atmosphere' => 'Znikoma egzosfera: tlen, sód, wodór',
        'missions' => 'Mariner 10, MESSENGER, BepiColombo',
        'fun_fact' => 'Przez brak gęstej atmosfery Merkury ma najbardziej skrajne wahania temperatur — w dzień ołów płynie, a w nocy panuje potężny mróz.'
    ],
    [
        'id' => 'venus',
        'name' => 'Wenus',
        'symbol' => '♀',
        'order' => 'II planeta od Słońca',
        'category' => 'rocky',
        'category_name' => 'Planeta skalista',
        'badge_class' => 'badge-supernova',
        'image' => 'images/planets/venus.jpg',
        'color' => '#f59e0b',
        'diameter' => '12 104 km',
        'diameter_rel' => '0.95x Ziemia',
        'distance_sun' => '0.72 AU (108.2 mln km)',
        'orbital_period' => '225 dni ziemskich',
        'moons' => '0',
        'temp' => '+465 °C (Stała piekielna)',
        'day_length' => '243 dni (dłuższy niż jej rok!)',
        'gravity' => '8.87 m/s² (0.9G)',
        'atmosphere' => 'CO₂ (96.5%), Azot (3.5%), chmury kwasu siarkowego',
        'missions' => 'Wenera (ZSRR), Magellan, Venus Express, Akatsuki',
        'fun_fact' => 'Jest najgorętszą planetą Układu z powodu gigantycznego efektu cieplarnianego. Co ciekawe, obraca się w stronę przeciwną niż większość planet.'
    ],
    [
        'id' => 'earth',
        'name' => 'Ziemia',
        'symbol' => '♁',
        'order' => 'III planeta od Słońca',
        'category' => 'rocky',
        'category_name' => 'Planeta skalista',
        'badge_class' => 'badge-exoplanet',
        'image' => 'images/planets/earth.jpg',
        'color' => '#38bdf8',
        'diameter' => '12 742 km',
        'diameter_rel' => 'Wzorzec (1.0x)',
        'distance_sun' => '1.00 AU (149.6 mln km)',
        'orbital_period' => '365.25 dni',
        'moons' => '1 (Księżyc)',
        'temp' => '+15 °C (Średnia globalna)',
        'day_length' => '23h 56m 04s',
        'gravity' => '9.81 m/s² (1.0G)',
        'atmosphere' => 'Azot (78%), Tlen (21%), Argon (0.9%), CO₂ (0.04%)',
        'missions' => 'Obserwacje satelitarne NASA, ESA, program Copernicus',
        'fun_fact' => 'Nasz dom — jedyne znane miejsce we Wszechświecie, gdzie woda występuje jednocześnie w trzech stanach skupienia i istnieje życie.'
    ],
    [
        'id' => 'mars',
        'name' => 'Mars',
        'symbol' => '♂',
        'order' => 'IV planeta od Słońca',
        'category' => 'rocky',
        'category_name' => 'Planeta skalista',
        'badge_class' => 'badge-supernova',
        'image' => 'images/planets/mars.jpg',
        'color' => '#ef4444',
        'diameter' => '6 779 km',
        'diameter_rel' => '0.53x Ziemia',
        'distance_sun' => '1.52 AU (227.9 mln km)',
        'orbital_period' => '687 dni (1.88 roku ziemskiego)',
        'moons' => '2 (Fobos, Deimos)',
        'temp' => '-63 °C (od -140°C do +20°C)',
        'day_length' => '24h 37m 22s (Sol)',
        'gravity' => '3.72 m/s² (0.38G)',
        'atmosphere' => 'CO₂ (95.3%), Azot (2.6%), Argon (1.9%)',
        'missions' => 'Curiosity, Perseverance, Insight, Hope, Tianwen-1',
        'fun_fact' => 'Na Marsie wznosi się Olympus Mons — gigantyczny wygasły wulkan o wysokości 21.9 km, prawie trzykrotnie wyższy od Mount Everestu.'
    ],
    [
        'id' => 'jupiter',
        'name' => 'Jowisz',
        'symbol' => '♃',
        'order' => 'V planeta od Słońca',
        'category' => 'gas',
        'category_name' => 'Gazowy olbrzym',
        'badge_class' => 'badge-galaxy',
        'image' => 'images/planets/jupiter.jpg',
        'color' => '#fbbf24',
        'diameter' => '139 820 km',
        'diameter_rel' => '11x Ziemia',
        'distance_sun' => '5.20 AU (778.5 mln km)',
        'orbital_period' => '11.86 lat ziemskich',
        'moons' => '95 (w tym Ganimedes, Europa, Io, Kallisto)',
        'temp' => '-110 °C (w wierzchołkach chmur)',
        'day_length' => '9h 55m (najszybszy obrót w Układzie)',
        'gravity' => '24.79 m/s² (2.53G)',
        'atmosphere' => 'Wodór (90%), Hel (10%), ślady metanu i amoniaku',
        'missions' => 'Pioneer, Voyager, Galileo, Juno, JUICE (w drodze)',
        'fun_fact' => 'Słynna Wielka Czerwona Plama to potężny cyklon wiejący od setek lat, który bez problemu zmieściłby w sobie całą kulę ziemską.'
    ],
    [
        'id' => 'saturn',
        'name' => 'Saturn',
        'symbol' => '♄',
        'order' => 'VI planeta od Słońca',
        'category' => 'gas',
        'category_name' => 'Gazowy olbrzym',
        'badge_class' => 'badge-bh',
        'image' => 'images/planets/saturn.jpg',
        'color' => '#fde047',
        'diameter' => '116 460 km',
        'diameter_rel' => '9.1x Ziemia',
        'distance_sun' => '9.58 AU (1.43 mld km)',
        'orbital_period' => '29.45 lat ziemskich',
        'moons' => '146 (Najwięcej w Układzie! m.in. Tytan, Enceladus)',
        'temp' => '-140 °C',
        'day_length' => '10h 33m',
        'gravity' => '10.44 m/s² (1.06G)',
        'atmosphere' => 'Wodór (96%), Hel (3%), metan, amoniak',
        'missions' => 'Pioneer 11, Voyager 1 & 2, Cassini-Huygens',
        'fun_fact' => 'Jego pierścienie mają szerokość 282 000 km, ale ich grubość to miejscami zaledwie 10-30 metrów! Gdyby wrzucić Saturna do wielkiego oceanu, unosiłby się na wodzie.'
    ],
    [
        'id' => 'uranus',
        'name' => 'Uran',
        'symbol' => '♅',
        'order' => 'VII planeta od Słońca',
        'category' => 'ice',
        'category_name' => 'Lodowy olbrzym',
        'badge_class' => 'badge-galaxy',
        'image' => 'images/planets/uranus.jpg',
        'color' => '#22d3ee',
        'diameter' => '50 724 km',
        'diameter_rel' => '4.0x Ziemia',
        'distance_sun' => '19.22 AU (2.87 mld km)',
        'orbital_period' => '84 lata ziemskie',
        'moons' => '28 (m.in. Miranda, Tytania, Oberon)',
        'temp' => '-195 °C (najzimniejsza atmosfera: do -224°C)',
        'day_length' => '17h 14m',
        'gravity' => '8.69 m/s² (0.89G)',
        'atmosphere' => 'Wodór (83%), Hel (15%), Metan (2.3% — daje lazurowy kolor)',
        'missions' => 'Voyager 2 (1986)',
        'fun_fact' => 'Uran to jedyna planeta, która toczy się po orbicie „na boku” — jej oś obrotu jest nachylona pod kątem aż 98°, prawdopodobnie wskutek dawnego zderzenia.'
    ],
    [
        'id' => 'neptune',
        'name' => 'Neptun',
        'symbol' => '♆',
        'order' => 'VIII planeta od Słońca',
        'category' => 'ice',
        'category_name' => 'Lodowy olbrzym',
        'badge_class' => 'badge-galaxy',
        'image' => 'images/planets/neptune.jpg',
        'color' => '#3b82f6',
        'diameter' => '49 244 km',
        'diameter_rel' => '3.9x Ziemia',
        'distance_sun' => '30.05 AU (4.50 mld km)',
        'orbital_period' => '164.8 lat ziemskich',
        'moons' => '16 (główny to Tryton z gejzerami ciekłego azotu)',
        'temp' => '-200 °C',
        'day_length' => '16h 06m',
        'gravity' => '11.15 m/s² (1.14G)',
        'atmosphere' => 'Wodór (80%), Hel (19%), Metan (1.5%)',
        'missions' => 'Voyager 2 (1989)',
        'fun_fact' => 'Na Neptunie wieją najszybsze wiatry w całym Układzie Słonecznym — ich prędkość dochodzi do niewiarygodnych 2 100 km/h (ponadprędkość dźwięku!).'
    ]
];
?>

<div class="container">
    <!-- Hero / Nagłówek sekcji -->
    <section class="planets-hero">
        <span class="hero-pill">🪐 Eksploracja Układu Planetarnego</span>
        <h1 class="hero-title" style="font-size: 2.6rem;">Układ Słoneczny</h1>
        <p class="hero-subtitle">
            Poznaj Słońce oraz 8 oficjalnych planet krążących w Ramieniu Oriona Drogi Mlecznej. Sprawdź ich wymiary, klimat, liczbę księżyców i fascynujące fakty.
        </p>

        <!-- Filtrowanie kategorii -->
        <div class="planet-filter-buttons">
            <button class="filter-btn active" data-filter="all">Wszystkie obiekty (9)</button>
            <button class="filter-btn" data-filter="rocky">Planety skaliste (4)</button>
            <button class="filter-btn" data-filter="gas">Gazowe olbrzymy (2)</button>
            <button class="filter-btn" data-filter="ice">Lodowe olbrzymy (2)</button>
            <button class="filter-btn" data-filter="star">Słońce (1)</button>
        </div>
    </section>

    <!-- Siatka Kart Planet -->
    <div class="planets-grid" id="planetsGrid">
        <?php foreach ($celestialBodies as $planet): ?>
        <article class="dash-card planet-card" id="planet-<?= $planet['id'] ?>" data-category="<?= $planet['category'] ?>">
            
            <!-- Górna belka karty -->
            <div class="planet-card-top">
                <div class="planet-order-tag">
                    <span class="planet-symbol" style="color: <?= $planet['color'] ?>;"><?= $planet['symbol'] ?></span>
                    <span><?= htmlspecialchars($planet['order']) ?></span>
                </div>
                <span class="obs-badge <?= $planet['badge_class'] ?>">
                    <?= htmlspecialchars($planet['category_name']) ?>
                </span>
            </div>

            <!-- Prezentacja Wizualna Planety -->
            <div class="planet-visual-stage">
                <div class="planet-glow-halo" style="background: radial-gradient(circle, <?= $planet['color'] ?>40 0%, transparent 70%);"></div>
                <img src="<?= htmlspecialchars($planet['image']) ?>" alt="<?= htmlspecialchars($planet['name']) ?>" class="planet-globe-img">
            </div>

            <!-- Tytuł obiektu -->
            <div class="planet-title-row">
                <h2 class="planet-name"><?= htmlspecialchars($planet['name']) ?></h2>
            </div>

            <!-- Kluczowe parametry fizyczne -->
            <div class="planet-stats-matrix">
                <div class="planet-stat-cell">
                    <span class="p-stat-lbl">Średnica równikowa</span>
                    <span class="p-stat-val"><?= $planet['diameter'] ?></span>
                    <span class="p-stat-sub"><?= $planet['diameter_rel'] ?></span>
                </div>
                <div class="planet-stat-cell">
                    <span class="p-stat-lbl">Odległość od Słońca</span>
                    <span class="p-stat-val"><?= $planet['distance_sun'] ?></span>
                </div>
                <div class="planet-stat-cell">
                    <span class="p-stat-lbl">Okres obiegu (rok)</span>
                    <span class="p-stat-val"><?= $planet['orbital_period'] ?></span>
                </div>
                <div class="planet-stat-cell">
                    <span class="p-stat-lbl">Znane księżyce</span>
                    <span class="p-stat-val" style="color: <?= $planet['color'] ?>;"><?= $planet['moons'] ?></span>
                </div>
                <div class="planet-stat-cell">
                    <span class="p-stat-lbl">Średnia temperatura</span>
                    <span class="p-stat-val"><?= $planet['temp'] ?></span>
                </div>
            </div>

            <!-- Ciekawostka naukowa NASA -->
            <div class="planet-fact-box">
                <span class="fact-bulb">💡</span>
                <p class="fact-text"><?= htmlspecialchars($planet['fun_fact']) ?></p>
            </div>

            <!-- Rozwijany akordeon ze szczegółami -->
            <div class="planet-accordion">
                <button class="accordion-toggle" onclick="toggleDetails('details-<?= $planet['id'] ?>', this)">
                    <span>Szczegóły atmosfery & misje</span>
                    <span class="toggle-icon">+</span>
                </button>
                <div class="accordion-content" id="details-<?= $planet['id'] ?>">
                    <div class="details-inner-grid">
                        <div class="detail-row">
                            <span class="d-label">Długość doby:</span>
                            <span class="d-val"><?= htmlspecialchars($planet['day_length']) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="d-label">Grawitacja:</span>
                            <span class="d-val"><?= htmlspecialchars($planet['gravity']) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="d-label">Atmosfera:</span>
                            <span class="d-val"><?= htmlspecialchars($planet['atmosphere']) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="d-label">Kluczowe misje:</span>
                            <span class="d-val"><?= htmlspecialchars($planet['missions']) ?></span>
                        </div>
                    </div>
                </div>
            </div>

        </article>
        <?php endforeach; ?>
    </div>
</div>

<script>
// Płynne filtrowanie kart planet
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.planet-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');

            cards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

// Rozwijanie szczegółów planety
function toggleDetails(id, btn) {
    const panel = document.getElementById(id);
    const icon = btn.querySelector('.toggle-icon');
    
    if (panel.style.maxHeight && panel.style.maxHeight !== '0px') {
        panel.style.maxHeight = '0px';
        btn.classList.remove('open');
        icon.textContent = '+';
    } else {
        panel.style.maxHeight = panel.scrollHeight + 'px';
        btn.classList.add('open');
        icon.textContent = '−';
    }
}
</script>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
