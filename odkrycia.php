<?php
/**
 * BEYOND — Odkrycia astronomiczne.
 * Strona prezentuje najważniejsze nowości i wyniki badań z obszaru kosmosu,
 * w prostym i czytelnym formacie kart informacyjnych.
 */

$pageTitle = 'Odkrycia';
require_once __DIR__ . '/includes/header.php';

$discoveries = [
    [
        'title' => 'JWST sprawdza atmosfery egzoplanet',
        'tag' => 'Exoplanety',
        'summary' => 'Nowe obserwacje teleskopu Jamesa Webba pomagają identyfikować skład chemiczny atmosfer planet krążących wokół odległych gwiazd.',
        'meta' => 'Dane z obserwacji JWST • 2026',
        'color' => 'cyan'
    ],
    [
        'title' => 'Nowe wskazówki o ciemnej materii',
        'tag' => 'Kosmologia',
        'summary' => 'Naukowcy analizują ruch galaktyk i potężne struktury kosmiczne, by lepiej zrozumieć, jak rozkłada się niewidzialna materia we Wszechświecie.',
        'meta' => 'Badania gromad galaktyk • 2026',
        'color' => 'violet'
    ],
    [
        'title' => 'Prawie 8 tys. potwierdzonych egzoplanet',
        'tag' => 'Astronomia',
        'summary' => 'Liczba znanych planet poza Układem Słonecznym rośnie, a kolejne misje pomagają wskazać światy potencjalnie zamieszkane.',
        'meta' => 'Katalog exoplanet • 2026',
        'color' => 'amber'
    ],
    [
        'title' => 'Sondy badają asteroidę zbliżającą się do Ziemi',
        'tag' => 'Planetologia',
        'summary' => 'Obserwacje asteroid pozwalają lepiej poznać skład ciał niebieskich i przygotować się na ewentualne zagrożenie z kosmosu.',
        'meta' => 'NEO / NASA • 2026',
        'color' => 'rose'
    ],
];

$featured = [
    'title' => 'Najnowsze badania kosmosu',
    'subtitle' => 'Nowe dane z teleskopów i misji kosmicznych pokazują, jak szybko rozwija się astronomia obserwacyjna.',
    'stats' => [
        ['label' => 'Eksoplanet', 'value' => '8,000+'],
        ['label' => 'Teleskopów aktywnych', 'value' => '14'],
        ['label' => 'Misji w toku', 'value' => '26'],
    ],
];
?>

<div class="container">
    <section class="page-hero" style="margin-bottom: 24px;">
        <div class="dashboard-topbar" style="margin-bottom: 0;">
            <div class="status-indicator">
                <span class="pulse-dot"></span>
                <span>Odkrycia</span>
            </div>
            <div class="sys-time">Astronomia w ruchu</div>
        </div>
    </section>

    <div class="dash-card" style="padding: 24px; margin-bottom: 24px; background: linear-gradient(135deg, rgba(12, 24, 40, 0.96), rgba(20, 17, 44, 0.9));">
        <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 24px; align-items: center;">
            <div>
                <div style="font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 8px;">
                    Nowe informacje
                </div>
                <h1 style="font-family: var(--font-heading); font-size: clamp(2rem, 3vw, 3rem); margin: 0 0 12px; color: var(--text-white);">
                    <?= htmlspecialchars($featured['title']) ?>
                </h1>
                <p style="margin: 0; color: var(--text-secondary); line-height: 1.7; max-width: 60ch;">
                    <?= htmlspecialchars($featured['subtitle']) ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px;">
                <?php foreach ($featured['stats'] as $stat): ?>
                    <div style="padding: 18px 12px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.03); text-align: center;">
                        <div style="font-size: 1.4rem; font-weight: 800; color: var(--neon-cyan); margin-bottom: 6px;">
                            <?= htmlspecialchars($stat['value']) ?>
                        </div>
                        <div style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.12em; color: var(--text-muted);">
                            <?= htmlspecialchars($stat['label']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 22px;">
        <?php foreach ($discoveries as $item): ?>
            <article class="dash-card" style="padding: 20px; border-left: 3px solid <?= $item['color'] === 'cyan' ? 'var(--neon-cyan)' : ($item['color'] === 'violet' ? '#b081ff' : ($item['color'] === 'amber' ? '#ffb86c' : '#ff7b9c')) ?>;">
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 14px; flex-wrap: wrap;">
                    <span style="display: inline-block; padding: 6px 10px; border-radius: 999px; font-size: 0.7rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-white); background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.08);">
                        <?= htmlspecialchars($item['tag']) ?>
                    </span>
                    <span style="font-size: 0.72rem; color: var(--text-muted);">
                        <?= htmlspecialchars($item['meta']) ?>
                    </span>
                </div>

                <h2 style="margin: 0 0 12px; font-size: 1.2rem; color: var(--text-white); font-family: var(--font-heading);">
                    <?= htmlspecialchars($item['title']) ?>
                </h2>

                <p style="margin: 0; color: var(--text-secondary); line-height: 1.8;">
                    <?= htmlspecialchars($item['summary']) ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
