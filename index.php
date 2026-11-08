<?php
/**
 * BEYOND — Modern Space & Astronomy Dashboard
 * Wzorowany na zaawansowanym futurystycznym pulpicie obserwatorium
 */

$pageTitle = 'Galactic Operations Dashboard';
require_once __DIR__ . '/includes/header.php';
?>

<div class="container">
    <!-- Pasek statusu obserwatorium -->
    <div class="dashboard-topbar">
        <div class="status-indicator">
            <span class="pulse-dot"></span>
            <span>Deep Space Telemetry Feed &bull; <strong>ONLINE</strong></span>
        </div>
        <div class="sys-time">
            TARGET: SGR A* [RA 17h 45m 40s &bull; DEC -29&deg; 00' 28"]
        </div>
    </div>

    <!-- Główna siatka dashboardu (układ 3 górne panele, 2 dolne) -->
    <div class="dashboard-layout">
        
        <!-- ================= GÓRNY RZĄD ================= -->
        <div class="dashboard-row-top">

            <!-- Panel 1: Galactic Overview -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <span class="neon-dot blue"></span>
                    <h2 class="dash-card-title">Galactic Overview</h2>
                </div>

                <div class="galaxy-view-box">
                    <img src="images/milky-way.jpg" alt="Droga Mleczna" class="galaxy-image">
                    
                    <div class="galaxy-stats-overlay">
                        <div class="galaxy-stat-item">
                            <span class="galaxy-stat-label">Observable Stars</span>
                            <span class="galaxy-stat-value">250 Billion</span>
                        </div>
                        <div class="galaxy-stat-item">
                            <span class="galaxy-stat-label">Known Exoplanets</span>
                            <span class="galaxy-stat-value">5,632</span>
                        </div>
                        <div class="galaxy-stat-item">
                            <span class="galaxy-stat-label">Black Holes</span>
                            <span class="galaxy-stat-value">78,340</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel 2: Exoplanet Discovery Stats -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <span class="neon-dot blue"></span>
                    <h2 class="dash-card-title">Exoplanet Discovery Stats</h2>
                </div>

                <div class="exoplanet-content">
                    <div class="card-subtitle">Exoplanets by Detection Method</div>
                    
                    <div class="donut-chart-wrapper">
                        <!-- SVG Donut Chart -->
                        <div class="donut-svg-container">
                            <svg width="140" height="140" viewBox="0 0 42 42">
                                <circle class="donut-hole" cx="21" cy="21" r="15.915" fill="transparent"></circle>
                                <circle class="donut-ring" cx="21" cy="21" r="15.915" fill="transparent" stroke="rgba(255,255,255,0.05)" stroke-width="6"></circle>
                                
                                <!-- Transit 65% (Pomarańcz) -->
                                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#ff9f1c" stroke-width="6"
                                        stroke-dasharray="65 35" stroke-dashoffset="25"></circle>
                                
                                <!-- Radial Velocity 22% (Niebieski) -->
                                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#3a86ff" stroke-width="6"
                                        stroke-dasharray="22 78" stroke-dashoffset="60"></circle>
                                
                                <!-- Microlensing 8% (Fiolet) -->
                                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#9d4edd" stroke-width="6"
                                        stroke-dasharray="8 92" stroke-dashoffset="38"></circle>
                                
                                <!-- Direct Imaging 5% (Błękit/Cyan) -->
                                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#00f0ff" stroke-width="6"
                                        stroke-dasharray="5 95" stroke-dashoffset="30"></circle>
                            </svg>
                        </div>

                        <!-- Legenda -->
                        <div class="donut-legend">
                            <div class="legend-row">
                                <span class="legend-dot" style="background: #ff9f1c;"></span>
                                <span class="legend-name">Transit</span>
                                <span class="legend-pct">65%</span>
                            </div>
                            <div class="legend-row">
                                <span class="legend-dot" style="background: #3a86ff;"></span>
                                <span class="legend-name">Radial Velocity</span>
                                <span class="legend-pct">22%</span>
                            </div>
                            <div class="legend-row">
                                <span class="legend-dot" style="background: #9d4edd;"></span>
                                <span class="legend-name">Microlensing</span>
                                <span class="legend-pct">8%</span>
                            </div>
                            <div class="legend-row">
                                <span class="legend-dot" style="background: #00f0ff;"></span>
                                <span class="legend-name">Direct Imaging</span>
                                <span class="legend-pct">5%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Radar położenia Słońca (Sol) -->
                    <div class="sol-radar-box">
                        <img src="images/milky-way.jpg" alt="Galactic Position" class="sol-radar-bg">
                        <div class="sol-pointer">
                            <span class="sol-dot"></span>
                            <span class="sol-label">Sol</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel 3: Star Classification Distribution -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <span class="neon-dot orange"></span>
                    <h2 class="dash-card-title">Star Classification Distribution</h2>
                </div>

                <div class="star-chart-container">
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
                                <div class="star-bar-rect bar-o" style="height: 6%;" title="Typ O: 0.2%"></div>
                                <span class="star-type-label">O</span>
                            </div>
                            <!-- B -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-b" style="height: 12%;" title="Typ B: 0.8%"></div>
                                <span class="star-type-label">B</span>
                            </div>
                            <!-- A -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-a" style="height: 25%;" title="Typ A: 3.2%"></div>
                                <span class="star-type-label">A</span>
                            </div>
                            <!-- F -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-f" style="height: 48%;" title="Typ F: ~12%"></div>
                                <span class="star-type-label">F</span>
                            </div>
                            <!-- G (Słońce) -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-g" style="height: 60%;" title="Typ G (Słońce): ~15%"></div>
                                <span class="star-type-label">G</span>
                            </div>
                            <!-- M (Czerwone karły) -->
                            <div class="star-bar-col">
                                <div class="star-bar-rect bar-m" style="height: 98%;" title="Typ M: ~55%"></div>
                                <span class="star-type-label">M</span>
                            </div>
                        </div>
                    </div>

                    <!-- Wskaźniki procentowe -->
                    <div class="star-metrics-grid">
                        <div>
                            <span class="star-metric-val">0.2%</span>
                            <span class="star-metric-sub">1,284</span>
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

                    <!-- Podsumowanie strefy zamieszkiwalnej -->
                    <div class="star-bottom-stats">
                        <span>Habitable Zone: <strong>1,284</strong></span>
                        <span>Earth Like: <strong>189</strong></span>
                        <span>Latest: <strong>Last 30 Days</strong></span>
                    </div>
                </div>
            </div>

        </div>


        <!-- ================= DOLNY RZĄD ================= -->
        <div class="dashboard-row-bottom">

            <!-- Panel 4: Black Hole Analysis -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <span class="neon-dot blue"></span>
                    <h2 class="dash-card-title">Black Hole Analysis</h2>
                </div>

                <div class="bh-charts-wrapper">
                    <!-- Mass Distribution -->
                    <div>
                        <div class="bh-section-title">Mass Distribution</div>
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

                    <!-- Accretion Rate (X-ray Luminosity) -->
                    <div>
                        <div class="bh-section-title">Accretion Rate (X-ray Luminosity)</div>
                        <div class="accretion-wave-box">
                            <svg class="accretion-svg" viewBox="0 0 500 70" preserveAspectRatio="none">
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
                            <div class="time-bracket">Time</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel 5: Recent Observations -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <span class="neon-dot orange"></span>
                    <h2 class="dash-card-title">Recent Observations</h2>
                </div>

                <div class="obs-table-container">
                    <table class="obs-table">
                        <thead>
                            <tr>
                                <th>Object</th>
                                <th>Type</th>
                                <th>Distance</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="obs-obj-name">NGC 6822</td>
                                <td>Dwarf Galaxy</td>
                                <td>1.6 Mly</td>
                                <td>High star formation</td>
                            </tr>
                            <tr>
                                <td class="obs-obj-name">Kepler-452b</td>
                                <td>Exoplanet</td>
                                <td>1,400 ly</td>
                                <td>Earth-like candidate</td>
                            </tr>
                            <tr>
                                <td class="obs-obj-name">M87*</td>
                                <td>Black Hole</td>
                                <td>53 Mly</td>
                                <td>Jet activity observed</td>
                            </tr>
                            <tr>
                                <td class="obs-obj-name">SN 2023hx</td>
                                <td>Supernova</td>
                                <td>220 Mly</td>
                                <td>Type Ia, peak magnitude</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: auto; padding-top: 14px; display: flex; justify-content: flex-end; gap: 10px;">
                    <a href="odkrycia.php" style="font-size: 0.8rem; color: var(--neon-cyan); text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                        Szczegółowy dziennik obserwacji &rarr;
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
