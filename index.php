<?php
/**
 * BEYOND — Nowoczesny Pulpit Astronomiczny (Dashboard)
 * Integracja w czasie rzeczywistym z oficjalnymi API NASA
 */

$pageTitle = 'Pulpit Operacji Galaktycznych';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/api.php';

// Pobieranie autentycznych danych na żywo z NASA API (z cache)
$exoData = getNasaExoplanetData();
$deepSpaceFeed = getDeepSpaceFeed();

// Dynamiczne obliczenia segmentów koła SVG (Donut) na podstawie danych NASA
$pctTransit = $exoData['methods']['Transit'];
$pctRV = $exoData['methods']['Radial Velocity'];
$pctMicro = $exoData['methods']['Microlensing'];
$pctImg = $exoData['methods']['Imaging'];

// Obliczenie offsetów SVG
$offset1 = 25;
$offset2 = ($offset1 - $pctTransit + 100) % 100;
$offset3 = ($offset2 - $pctRV + 100) % 100;
$offset4 = ($offset3 - $pctMicro + 100) % 100;
?>

<div class="container">
    <!-- Główna siatka dashboardu (3 panele na górze, 2 na dole) -->
    <div class="dashboard-layout">
        
        <!-- ================= GÓRNY RZĄD ================= -->
        <div class="dashboard-row-top">

            <!-- Panel 1: Przegląd Galaktyki -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <span class="neon-dot blue"></span>
                    <h2 class="dash-card-title">Przegląd Galaktyki</h2>
                </div>

                <div class="galaxy-view-box">
                    <img src="images/milky-way.jpg" alt="Droga Mleczna" class="galaxy-image">
                </div>
                
                <!-- Statystyki umieszczone pod zdjęciem -->
                <div class="galaxy-stats-row">
                    <div class="galaxy-stat-box">
                        <span class="galaxy-stat-value">250 Mld</span>
                        <span class="galaxy-stat-label">Widoczne gwiazdy</span>
                    </div>
                    <div class="galaxy-stat-box">
                        <span class="galaxy-stat-value"><?= number_format($exoData['total'], 0, '', ' ') ?></span>
                        <span class="galaxy-stat-label">Egzoplanety</span>
                    </div>
                    <div class="galaxy-stat-box">
                        <span class="galaxy-stat-value">78 340</span>
                        <span class="galaxy-stat-label">Czarne dziury</span>
                    </div>
                </div>
            </div>

            <!-- Panel 2: Statystyki Odkryć Egzoplanet (Live NASA Archive API) -->
            <div class="dash-card">
                <div class="dash-card-header" style="justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span class="neon-dot blue"></span>
                        <h2 class="dash-card-title">Odkrycia Egzoplanet</h2>
                    </div>
                    <span style="font-size: 0.68rem; color: #10b981; font-weight: 700; background: rgba(16, 185, 129, 0.12); padding: 3px 8px; border-radius: 20px; border: 1px solid rgba(16, 185, 129, 0.3); display: inline-flex; align-items: center; gap: 5px;">
                        <span class="pulse-dot" style="width: 5px; height: 5px; background: #10b981; box-shadow: 0 0 8px #10b981;"></span> NASA API LIVE
                    </span>
                </div>

                <div class="exoplanet-content">
                    <div class="card-subtitle">Rozkład metod detekcji planet (NASA Exoplanet Archive)</div>
                    
                    <div class="donut-chart-wrapper">
                        <!-- Nowoczesny SVG Donut Chart wyliczany z żywych danych NASA -->
                        <div class="donut-svg-container">
                            <svg width="145" height="145" viewBox="0 0 42 42">
                                <circle class="donut-hole" cx="21" cy="21" r="15.915" fill="transparent"></circle>
                                <circle class="donut-ring" cx="21" cy="21" r="15.915" fill="transparent" stroke="rgba(255,255,255,0.06)" stroke-width="5.5"></circle>
                                
                                <!-- Tranzyt -->
                                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#ff9f1c" stroke-width="5.5"
                                        stroke-dasharray="<?= $pctTransit ?> <?= 100 - $pctTransit ?>" stroke-dashoffset="<?= $offset1 ?>" stroke-linecap="round"></circle>
                                
                                <!-- Prędkość radialna -->
                                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#3b82f6" stroke-width="5.5"
                                        stroke-dasharray="<?= $pctRV ?> <?= 100 - $pctRV ?>" stroke-dashoffset="<?= $offset2 ?>" stroke-linecap="round"></circle>
                                
                                <!-- Mikrosoczewkowanie -->
                                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#a855f7" stroke-width="5.5"
                                        stroke-dasharray="<?= $pctMicro ?> <?= 100 - $pctMicro ?>" stroke-dashoffset="<?= $offset3 ?>" stroke-linecap="round"></circle>
                                
                                <!-- Bezpośrednie obrazowanie -->
                                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#00f0ff" stroke-width="5.5"
                                        stroke-dasharray="<?= $pctImg ?> <?= 100 - $pctImg ?>" stroke-dashoffset="<?= $offset4 ?>" stroke-linecap="round"></circle>
                                
                                <!-- Licznik pobrany na żywo z NASA -->
                                <text x="21" y="20" text-anchor="middle" fill="#ffffff" font-family="'Space Grotesk', sans-serif" font-size="5.4" font-weight="700"><?= number_format($exoData['total'], 0, '', ' ') ?></text>
                                <text x="21" y="25" text-anchor="middle" fill="#94a3b8" font-family="'Plus Jakarta Sans', sans-serif" font-size="2.5" font-weight="600" letter-spacing="0.5">PLANET</text>
                            </svg>
                        </div>

                        <!-- Legenda wyliczana z żywych danych NASA -->
                        <div class="donut-legend">
                            <div class="legend-row">
                                <span class="legend-dot" style="background: #ff9f1c; box-shadow: 0 0 8px #ff9f1c;"></span>
                                <span class="legend-name">Tranzyt</span>
                                <span class="legend-pct"><?= $pctTransit ?>%</span>
                            </div>
                            <div class="legend-row">
                                <span class="legend-dot" style="background: #3b82f6; box-shadow: 0 0 8px #3b82f6;"></span>
                                <span class="legend-name">Prędkość radialna</span>
                                <span class="legend-pct"><?= $pctRV ?>%</span>
                            </div>
                            <div class="legend-row">
                                <span class="legend-dot" style="background: #a855f7; box-shadow: 0 0 8px #a855f7;"></span>
                                <span class="legend-name">Mikrosoczewkowanie</span>
                                <span class="legend-pct"><?= $pctMicro ?>%</span>
                            </div>
                            <div class="legend-row">
                                <span class="legend-dot" style="background: #00f0ff; box-shadow: 0 0 8px #00f0ff;"></span>
                                <span class="legend-name">Bezpośrednie foto</span>
                                <span class="legend-pct"><?= $pctImg ?>%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Informacja o źródle danych -->
                    <div style="margin-top: auto; padding-top: 12px; border-top: 1px solid rgba(255,255,255,0.06); font-size: 0.8rem; color: var(--text-muted); display: flex; justify-content: space-between; align-items: center;">
                        <span>Najbliższa egzoplaneta:</span>
                        <strong style="color: var(--neon-cyan);">Proxima Centauri b (4.24 lat św.)</strong>
                    </div>
                </div>
            </div>

            <!-- Panel 3: Rozkład Typów Widmowych Gwiazd -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <span class="neon-dot orange"></span>
                    <h2 class="dash-card-title">Klasyfikacja Gwiazd</h2>
                </div>

                <div class="star-chart-container">
                    <div class="card-subtitle">Rozkład typów widmowych w Galaktyce</div>

                    <div class="chart-axis-wrapper">
                        <div class="chart-y-axis">
                            <span>50%</span>
                            <span>40%</span>
                            <span>30%</span>
                            <span>20%</span>
                            <span>0%</span>
                        </div>
                        
                        <div class="chart-bars-area">
                            <!-- O -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-o" style="height: 6%;" title="Typ O: 0.2% (Niebieskie nadolbrzymy)"></div>
                                <span class="star-type-label">O</span>
                            </div>
                            <!-- B -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-b" style="height: 12%;" title="Typ B: 0.8% (Błękitne olbrzymy)"></div>
                                <span class="star-type-label">B</span>
                            </div>
                            <!-- A -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-a" style="height: 25%;" title="Typ A: 3.2% (Białe gwiazdy, np. Syriusz)"></div>
                                <span class="star-type-label">A</span>
                            </div>
                            <!-- F -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-f" style="height: 48%;" title="Typ F: ~12% (Żółto-białe)"></div>
                                <span class="star-type-label">F</span>
                            </div>
                            <!-- G (Słońce) -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-g" style="height: 60%;" title="Typ G: ~15% (Żółte karły — Słońce)"></div>
                                <span class="star-type-label">G</span>
                            </div>
                            <!-- M (Czerwone karły) -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-m" style="height: 98%;" title="Typ M: ~55% (Czerwone karły, najliczniejsze)"></div>
                                <span class="star-type-label">M</span>
                            </div>
                        </div>
                    </div>

                    <!-- Wskaźniki procentowe pod słupkami -->
                    <div class="star-metrics-grid">
                        <div>
                            <span class="star-metric-val">0.2%</span>
                            <span class="star-metric-sub">1 284</span>
                        </div>
                        <div>
                            <span class="star-metric-val">0.8%</span>
                            <span class="star-metric-sub">6.8%</span>
                        </div>
                        <div>
                            <span class="star-metric-val">3.2%</span>
                            <span class="star-metric-sub">3.9%</span>
                        </div>
                        <div>
                            <span class="star-metric-val">7.5%</span>
                            <span class="star-metric-sub">7.9%</span>
                        </div>
                    </div>

                    <!-- Podsumowanie strefy zdatnej do życia -->
                    <div class="star-bottom-stats">
                        <span>Strefa życia: <strong>1 284</strong></span>
                        <span>Bliźniaczki Ziemi: <strong>189</strong></span>
                        <span>Ostatnie 30 dni: <strong>+42 nowe</strong></span>
                    </div>
                </div>
            </div>

        </div>


        <!-- ================= DOLNY RZĄD ================= -->
        <div class="dashboard-row-bottom">

            <!-- Panel 4: Analiza Czarnych Dziur -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <span class="neon-dot blue"></span>
                    <h2 class="dash-card-title">Analiza Czarnych Dziur</h2>
                </div>

                <div class="bh-charts-wrapper">
                    <!-- Rozkład Mas -->
                    <div>
                        <div class="bh-section-title">Rozkład Mas (Masy Słońca M&#9737;)</div>
                        <div class="mass-dist-chart">
                            <div class="mass-bar" style="height: 85%; background: #2563eb;"></div>
                            <div class="mass-bar" style="height: 100%; background: #3b82f6;"></div>
                            <div class="mass-bar" style="height: 70%; background: #6366f1;"></div>
                            <div class="mass-bar" style="height: 55%; background: #8b5cf6;"></div>
                            <div class="mass-bar" style="height: 35%; background: #ec4899;"></div>
                            <div class="mass-bar" style="height: 40%; background: #f43f5e;"></div>
                            <div class="mass-bar" style="height: 50%; background: #fb923c;"></div>
                            <div class="mass-bar" style="height: 45%; background: #f59e0b;"></div>
                            <div class="mass-bar" style="height: 30%; background: #eab308;"></div>
                            <div class="mass-bar" style="height: 25%; background: #84cc16;"></div>
                            <div class="mass-bar" style="height: 20%; background: #10b981;"></div>
                            <div class="mass-bar" style="height: 22%; background: #06b6d4;"></div>
                            <div class="mass-bar" style="height: 18%; background: #0ea5e9;"></div>
                            <div class="mass-bar" style="height: 15%; background: #3b82f6;"></div>
                            <div class="mass-bar" style="height: 12%; background: #6366f1;"></div>
                            <div class="mass-bar" style="height: 15%; background: #8b5cf6;"></div>
                            <div class="mass-bar" style="height: 10%; background: #a855f7;"></div>
                            <div class="mass-bar" style="height: 8%; background: #3b82f6;"></div>
                            <div class="mass-bar" style="height: 12%; background: #00f0ff;"></div>
                        </div>
                        <div class="mass-x-axis">
                            <span>0</span>
                            <span>10</span>
                            <span>50</span>
                            <span>100</span>
                            <span>200</span>
                            <span>500 M&#9737;</span>
                        </div>
                    </div>

                    <!-- Tempo Akrecji & Promieniowanie X-Ray -->
                    <div>
                        <div class="bh-section-title">Tempo Akrecji (Jasność Promieniowania X-Ray)</div>
                        <div class="accretion-wave-box">
                            <svg class="accretion-svg" viewBox="0 0 500 70" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="waveGlow" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#00f0ff" stop-opacity="0.35" />
                                        <stop offset="100%" stop-color="#00f0ff" stop-opacity="0.0" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#waveGlow)" d="M 0,45 
                                         Q 20,40 35,46 
                                         T 70,35 
                                         T 105,25 
                                         T 140,40 
                                         T 175,20 
                                         T 210,48 
                                         T 245,30 
                                         T 280,50 
                                         T 315,22 
                                         T 350,45 
                                         T 385,32 
                                         T 420,52 
                                         T 455,40 
                                         T 500,28 
                                         L 500,70 L 0,70 Z" />
                                <path class="wave-path" d="M 0,45 
                                         Q 20,40 35,46 
                                         T 70,35 
                                         T 105,25 
                                         T 140,40 
                                         T 175,20 
                                         T 210,48 
                                         T 245,30 
                                         T 280,50 
                                         T 315,22 
                                         T 350,45 
                                         T 385,32 
                                         T 420,52 
                                         T 455,40 
                                         T 500,28" />
                            </svg>
                        </div>
                        <div class="time-bracket-wrapper">
                            <div class="time-bracket">Oś czasu [Cykl obserwacyjny]</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel 5: Obserwacje Głębokiego Kosmosu & Flota Badawcza -->
            <div class="dash-card">
                <div class="dash-card-header" style="justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span class="neon-dot orange"></span>
                        <h2 class="dash-card-title">Głęboki Kosmos</h2>
                    </div>
                    <span style="font-size: 0.68rem; color: #ff9f1c; font-weight: 700; background: rgba(255, 159, 28, 0.12); padding: 3px 8px; border-radius: 20px; border: 1px solid rgba(255, 159, 28, 0.3); display: inline-flex; align-items: center; gap: 5px;">
                        <span class="pulse-dot" style="width: 5px; height: 5px; background: #ff9f1c; box-shadow: 0 0 8px #ff9f1c;"></span> LIVE FEED
                    </span>
                </div>

                <div class="obs-table-container">
                    <table class="obs-table">
                        <thead>
                            <tr>
                                <th>Obiekt / Misja</th>
                                <th>Kategoria</th>
                                <th>Dystans</th>
                                <th>Status / Cel badawczy</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($deepSpaceFeed as $item): ?>
                            <tr>
                                <td class="obs-obj-name">
                                    <span><?= $item['icon'] ?></span> <?= htmlspecialchars($item['name']) ?>
                                </td>
                                <td>
                                    <span class="obs-badge <?= htmlspecialchars($item['badge']) ?>">
                                        <?= htmlspecialchars($item['type']) ?>
                                    </span>
                                </td>
                                <td style="font-family: var(--font-heading); color: #ffffff;"><?= htmlspecialchars($item['distance']) ?></td>
                                <td><?= $item['notes'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: auto; padding-top: 16px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 0.75rem; color: var(--text-muted);">
                        Dane: NASA Exoplanet Science &bull; JPL Horizons Telemetry
                    </span>
                    <a href="odkrycia.php" style="font-family: var(--font-ui); font-size: 0.84rem; font-weight: 600; color: var(--neon-cyan); text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                        Wszystkie odkrycia &rarr;
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
