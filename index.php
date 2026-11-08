<?php
/**
 * BEYOND — Strona Główna (Dashboard Astronomiczny)
 */

$pageTitle = 'Dashboard Astronomiczny';
require_once __DIR__ . '/includes/header.php';

// Prawdziwe dane astronomiczne z NASA i ESA do wyświetlenia w panelach
$exoplanetStats = [
    'confirmed' => '5,632+',
    'planetary_systems' => '4,150+',
    'earth_like' => '70+',
    'latest_mission' => 'James Webb (JWST)'
];

$blackHoleFacts = [
    'nearest' => 'Gaia BH1 (~1560 lat św.)',
    'supermassive' => 'Sagittarius A* (Centrum Drogi Mlecznej)',
    'mass_sgr_a' => '4.3 mln mas Słońca',
    'event_horizon' => '~24 mln km średnicy'
];

$recentDiscoveries = [
    [
        'date' => '2024 / JWST',
        'title' => 'Atmosfera egzoplanety WASP-96b',
        'desc' => 'Teleskop Jamesa Webba wykrył jednoznaczne sygnatury pary wodnej i chmur w atmosferze gazowego olbrzyma oddalonego o 1150 lat świetlnych.'
    ],
    [
        'date' => '2024 / Perseverance',
        'title' => 'Próbki skał z krateru Jezero na Marsie',
        'desc' => 'Łazik NASA odkrył minerały ilaste wskazujące na długotrwałą obecność ciekłej wody i potencjalnych biosygnatur w dawnej historii Czerwonej Planety.'
    ],
    [
        'date' => '2023 / EHT',
        'title' => 'Nowe pole magnetyczne wokół Sgr A*',
        'desc' => 'Event Horizon Telescope ujawnił silne, uporządkowane linie pola magnetycznego wirujące wokół krawędzi supermasywnej czarnej dziury w naszej Galaktyce.'
    ]
];
?>

<div class="container">
    <!-- Hero / Wprowadzenie -->
    <section class="hero">
        <span class="hero-pill">✨ Centrum Obserwacji Kosmicznych</span>
        <h1 class="hero-title">Odkrywaj Granice Wszechświata</h1>
        <p class="hero-subtitle">
            Interaktywny portal gromadzący rzeczywiste dane z misji NASA, teleskopów kosmicznych i najnowszych odkryć astrofizycznych.
        </p>
    </section>

    <!-- Siatka Dashboardu -->
    <div class="dashboard-grid">
        
        <!-- Panel 1: Galactic Overview (Droga Mleczna) -->
        <div class="card col-8">
            <div class="card-header">
                <div class="card-title-group">
                    <div class="card-icon">🌌</div>
                    <div>
                        <h2 class="card-title">Galactic Overview — Droga Mleczna</h2>
                        <span style="font-size: 0.8rem; color: var(--text-muted);">Nasza rodzima galaktyka spiralna z poprzeczką</span>
                    </div>
                </div>
                <span class="badge badge-cyan">Lokalna Grupa</span>
            </div>
            
            <p style="color: var(--text-secondary); margin-bottom: 16px;">
                Droga Mleczna to olbrzymi wir gwiezdny, w którym Układ Słoneczny znajduje się w Ramieniu Oriona, około 26 000 lat świetlnych od centrum galaktyki.
            </p>

            <div class="stats-row">
                <div class="stat-box">
                    <span class="stat-value">100,000</span>
                    <span class="stat-label">Lat św. średnicy</span>
                </div>
                <div class="stat-box">
                    <span class="stat-value">100–400</span>
                    <span class="stat-label">Miliardów gwiazd</span>
                </div>
                <div class="stat-box">
                    <span class="stat-value">230 mln</span>
                    <span class="stat-label">Lat obieg słońca</span>
                </div>
            </div>

            <div style="margin-top: 14px; display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                <a href="uklad.php" class="btn btn-primary">Eksploruj Układ Słoneczny &rarr;</a>
                <a href="misje.php" class="btn btn-outline">Zobacz misje kosmiczne</a>
            </div>
        </div>

        <!-- Panel 2: Egzoplanety (Exoplanet Discovery) -->
        <div class="card col-4">
            <div class="card-header">
                <div class="card-title-group">
                    <div class="card-icon">🪐</div>
                    <h2 class="card-title">Egzoplanety</h2>
                </div>
                <span class="badge badge-purple">NASA Archive</span>
            </div>

            <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 12px;">
                Planety krążące wokół gwiazd innych niż Słońce. Większość odkryto dzięki misjom Kepler, TESS i JWST.
            </p>

            <div class="stats-row" style="grid-template-columns: 1fr 1fr;">
                <div class="stat-box">
                    <span class="stat-value" style="color: var(--accent-purple);"><?= $exoplanetStats['confirmed'] ?></span>
                    <span class="stat-label">Potwierdzonych</span>
                </div>
                <div class="stat-box">
                    <span class="stat-value" style="color: var(--accent-orange);"><?= $exoplanetStats['planetary_systems'] ?></span>
                    <span class="stat-label">Układów planet.</span>
                </div>
            </div>

            <div style="margin-top: auto; padding-top: 12px; border-top: 1px solid rgba(255,255,255,0.06); font-size: 0.85rem; color: var(--text-muted);">
                🎯 Strefa zamieszkiwalna: <strong><?= $exoplanetStats['earth_like'] ?></strong> planet wielkości Ziemi
            </div>
        </div>

        <!-- Panel 3: Klasyfikacja Gwiazd (Typy widmowe Harwardzkie) -->
        <div class="card col-6">
            <div class="card-header">
                <div class="card-title-group">
                    <div class="card-icon">☀️</div>
                    <div>
                        <h2 class="card-title">Klasyfikacja Gwiazd (Typy Widmowe)</h2>
                        <span style="font-size: 0.8rem; color: var(--text-muted);">Klasyfikacja Harvarda wg temperatury fotosfery</span>
                    </div>
                </div>
                <span class="badge badge-orange">Astrofizyka</span>
            </div>

            <table class="star-table">
                <thead>
                    <tr>
                        <th>Typ</th>
                        <th>Barwa</th>
                        <th>Temp. powierzchni</th>
                        <th>Przykład</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="star-type star-o">O</span></td>
                        <td>Niebieska</td>
                        <td>&gt; 30,000 K</td>
                        <td>Alnitak (Pas Oriona)</td>
                    </tr>
                    <tr>
                        <td><span class="star-type star-b">B</span></td>
                        <td>Niebiesko-biała</td>
                        <td>10,000 – 30,000 K</td>
                        <td>Rigel</td>
                    </tr>
                    <tr>
                        <td><span class="star-type star-a">A</span></td>
                        <td>Biała</td>
                        <td>7,500 – 10,000 K</td>
                        <td>Syriusz, Wega</td>
                    </tr>
                    <tr>
                        <td><span class="star-type star-f">F</span></td>
                        <td>Żółto-biała</td>
                        <td>6,000 – 7,500 K</td>
                        <td>Procjon</td>
                    </tr>
                    <tr>
                        <td><span class="star-type star-g">G</span></td>
                        <td>Żółta</td>
                        <td>5,200 – 6,000 K</td>
                        <td><strong>Słońce (G2V)</strong>, Alfa Centauri A</td>
                    </tr>
                    <tr>
                        <td><span class="star-type star-k">K</span></td>
                        <td>Pomarańczowa</td>
                        <td>3,700 – 5,200 K</td>
                        <td>Arktur, Aldebaran</td>
                    </tr>
                    <tr>
                        <td><span class="star-type star-m">M</span></td>
                        <td>Czerwona</td>
                        <td>2,400 – 3,700 K</td>
                        <td>Betelgeza, Proxima Centauri</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Panel 4: Czarne Dziury (Black Hole Analysis) -->
        <div class="card col-6">
            <div class="card-header">
                <div class="card-title-group">
                    <div class="card-icon">🕳️</div>
                    <div>
                        <h2 class="card-title">Czarne Dziury — Analiza Osobliwości</h2>
                        <span style="font-size: 0.8rem; color: var(--text-muted);">Obszary czasoprzestrzeni o nieskończonej grawitacji</span>
                    </div>
                </div>
                <span class="badge badge-cyan">Relatywistyka</span>
            </div>

            <p style="color: var(--text-secondary); margin-bottom: 14px;">
                Czarne dziury zakrzywiają czasoprzestrzeń do tego stopnia, że nic — nawet światło — nie jest w stanie uciec spoza tzw. <strong>horyzontu zdarzeń</strong>.
            </p>

            <div class="stats-row">
                <div class="stat-box">
                    <span class="stat-value" style="font-size: 1.3rem;"><?= $blackHoleFacts['mass_sgr_a'] ?></span>
                    <span class="stat-label">Masa Sgr A* w centrum</span>
                </div>
                <div class="stat-box">
                    <span class="stat-value" style="font-size: 1.3rem;"><?= $blackHoleFacts['event_horizon'] ?></span>
                    <span class="stat-label">Horyzont zdarzeń Sgr A*</span>
                </div>
            </div>

            <div style="background: rgba(0, 0, 0, 0.4); border-left: 3px solid var(--accent-cyan); padding: 12px 16px; border-radius: var(--radius-sm); margin-top: 10px;">
                <p style="font-size: 0.85rem; color: var(--text-secondary);">
                    💡 <strong>Ciekawostka fizyczna:</strong> W pobliżu czarnej dziury dochodzi do tzw. <em>dylatacji grawitacyjnej czasu</em> — dla zewnętrznego obserwatora zegar spadającego obiektu zwalnia aż do pozornego zatrzymania na krawędzi horyzontu zdarzeń.
                </p>
            </div>
        </div>

        <!-- Panel 5: Najnowsze Odkrycia (Recent Discoveries) -->
        <div class="card col-12">
            <div class="card-header">
                <div class="card-title-group">
                    <div class="card-icon">📡</div>
                    <div>
                        <h2 class="card-title">Najnowsze Odkrycia Astronomiczne</h2>
                        <span style="font-size: 0.8rem; color: var(--text-muted);">Aktualne doniesienia z teleskopów kosmicznych i łazików</span>
                    </div>
                </div>
                <a href="odkrycia.php" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem;">Wszystkie odkrycia &rarr;</a>
            </div>

            <ul class="discovery-list">
                <?php foreach ($recentDiscoveries as $item): ?>
                    <li class="discovery-item">
                        <span class="discovery-item-date"><?= htmlspecialchars($item['date']) ?></span>
                        <div>
                            <div class="discovery-item-title"><?= htmlspecialchars($item['title']) ?></div>
                            <div class="discovery-item-desc"><?= htmlspecialchars($item['desc']) ?></div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
