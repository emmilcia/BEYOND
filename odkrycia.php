<?php
/**
 * BEYOND — Artykuły o kosmosie.
 * Sekcja ma być czytelna i stabilna: bez zewnętrznych obrazów, bez nowych zależności,
 * z prostym układem artykułów i jasną strukturą „dalszych lektur”.
 */

$pageTitle = 'Artykuły';
require_once __DIR__ . '/includes/header.php';

$featured = [
    'title' => 'Artykuły o kosmosie',
    'subtitle' => 'Czarne dziury, odległe światy, narodziny gwiazd i inne historie zapisane w kosmosie.'
];

$articles = [
    [
        'tag' => 'CZARNE DZIURY',
        'category' => 'black-holes',
        'title' => 'Badania pól magnetycznych wokół czarnych dziur dostarczają nowych danych',
        'summary' => 'Naukowcy eksplorują plazmę, promieniowanie i mechanizmy akrecji otaczające aktywne jądra galaktyk. Właśnie tam powstają najbardziej ekstremalne procesy we Wszechświecie.',
        'meta' => 'AGN • materia • promieniowanie',
        'accent' => '#ff7aa2',
        'image' => 'images/articles/black-hole-m87.jpg',
        'image_alt' => 'Galaktyka M87 z dżetem materii wyrzucanym z okolic czarnej dziury',
        'image_credit' => 'NASA/JPL-Caltech'
    ],
    [
        'tag' => 'EGZOPLANETY',
        'category' => 'exoplanets',
        'title' => 'JWST rozpoznaje skład atmosfer planet poza Układem Słonecznym',
        'summary' => 'Teleskop Jamesa Webba analizuje atmosfery odległych planet, szukając śladów wody, CO2 i innych gazów, które mogą wskazywać na warunki sprzyjające życiu.',
        'meta' => 'James Webb • atmosfera',
        'accent' => '#61dafb',
        'image' => 'images/articles/exoplanet-trappist-1f.jpg',
        'image_alt' => 'Artystyczna wizja powierzchni egzoplanety TRAPPIST-1f',
        'image_credit' => 'NASA/JPL-Caltech'
    ],
    [
        'tag' => 'KOSMOLOGIA',
        'category' => 'cosmology',
        'title' => 'Euclid pomaga mapować ciemną energię i strukturę Wszechświata',
        'summary' => 'Nowe dane z misji Euclid pomagają lepiej rozumieć rozkład materii i przyspieszające rozszerzanie się kosmosu w dużej skali.',
        'meta' => 'ESA / Euclid • ciemna energia',
        'accent' => '#b38bff',
        'image' => 'images/articles/cosmology-xdf.jpg',
        'image_alt' => 'Głębokie pole Hubble’a pełne odległych galaktyk',
        'image_credit' => 'NASA/ESA'
    ],
    [
        'tag' => 'GWIAZDY',
        'category' => 'stars',
        'title' => 'Formowanie nowych gwiazd wyjaśnia złożoność młodych galaktyk',
        'summary' => 'W młodych galaktykach proces powstawania gwiazd okazuje się bardziej dynamiczny niż wcześniej sądzono, co zmienia obraz ich ewolucji.',
        'meta' => 'astrofizyka • formacja',
        'accent' => '#ffb86c',
        'image' => 'images/articles/star-formation-carina.jpg',
        'image_alt' => 'Obszar powstawania młodych gwiazd w Mgławicy Carina',
        'image_credit' => 'NASA/ESA/CSA/STScI'
    ],
    [
        'tag' => 'UKŁAD SŁONECZNY',
        'category' => 'solar-system',
        'title' => 'Europa i Enceladus nadal są kluczowymi celami poszukiwań życia',
        'summary' => 'Lodowe księżyce Jowisza i Saturna budzą coraz większe zainteresowanie. Ich oceany mogą kryć prostą biologię lub przynajmniej warunki do jej powstania.',
        'meta' => 'Europa Clipper • astrobiologia',
        'accent' => '#6ee7c8',
        'image' => 'images/articles/europa-galileo.jpg',
        'image_alt' => 'Kolorowa mapa spękanej, lodowej powierzchni księżyca Europa',
        'image_credit' => 'NASA/JPL-Caltech/SETI Institute'
    ],
    [
        'tag' => 'PLANETOLOGIA',
        'category' => 'planetary-science',
        'title' => 'Badania asteroid i planetoid pomagają zrozumieć początki Układu Słonecznego',
        'summary' => 'Kształt, skład i kolizje planetoid dostarczają ważnych wskazówek o tym, jak powstały planety i jakie procesy występowały na samym początku.',
        'meta' => 'asteroidy • początki planet',
        'accent' => '#ffd166',
        'image' => 'images/articles/asteroid-bennu.jpg',
        'image_alt' => 'Zbliżenie na głazisty teren asteroidy Bennu sfotografowany przez OSIRIS-REx',
        'image_credit' => 'NASA/Goddard/University of Arizona'
    ]
];

$related = [
    ['title' => 'Nowe mapy galaktyk podnoszą dokładność pomiarów odległości kosmicznych', 'tag' => 'Gaia / astrometria', 'category' => 'cosmology'],
    ['title' => 'Teleskopy naziemne szukają sygnałów z obłoków molekularnych', 'tag' => 'Formowanie gwiazd', 'category' => 'stars'],
    ['title' => 'Misje do Marsa wciąż dostarczają danych o historii planety', 'tag' => 'Mars / Perseverance', 'category' => 'planetary-science'],
    ['title' => 'Sondy badają lód i substancje organiczne na Księżycu', 'tag' => 'Lodowe księżyce', 'category' => 'solar-system'],
    ['title' => 'Co skład atmosfery egzoplanety mówi o jej warunkach?', 'tag' => 'Egzoplanety', 'category' => 'exoplanets'],
    ['title' => 'Jak astronomowie badają czarne dziury, których nie widać?', 'tag' => 'Czarne dziury', 'category' => 'black-holes'],
];

$categories = [];
foreach ($articles as $article) {
    $categories[$article['category']] = $article['tag'];
}
?>

<div class="container">
    <section class="page-hero" style="margin-bottom: 24px;">
        <div class="dashboard-topbar" style="margin-bottom: 0;">
            <div class="status-indicator">
                <span class="pulse-dot"></span>
                <span>Artykuły</span>
            </div>
            <div class="sys-time">Kosmos w ruchu</div>
        </div>
    </section>

    <div class="dash-card" style="padding: 0; margin-bottom: 28px; overflow: hidden; border: 1px solid rgba(255,255,255,0.08); background: linear-gradient(135deg, rgba(11,18,30,0.96), rgba(21,17,40,0.94));">
        <div style="display: grid; grid-template-columns: 1fr; min-height: 300px;">
            <div style="padding: 28px; display: flex; align-items: end; background: linear-gradient(120deg, rgba(6,13,21,0.72), rgba(27,20,43,0.66)), url('images/articles/banner-galaxies.jpg') center/cover no-repeat;">
                <div style="max-width: 700px;">
                    <div style="font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 10px;">
                        Wybór tekstów
                    </div>
                    <h1 style="font-family: var(--font-heading); font-size: clamp(2.1rem, 3vw, 3.2rem); color: var(--text-white); margin: 0 0 12px; line-height: 1.1;">
                        <?= htmlspecialchars($featured['title']) ?>
                    </h1>
                    <p style="margin: 0; color: rgba(255,255,255,0.84); line-height: 1.7; max-width: 58ch;">
                        <?= htmlspecialchars($featured['subtitle']) ?>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 22px;" aria-label="Filtruj artykuły według kategorii">
        <button type="button" class="article-filter active" data-category="all" aria-pressed="true" style="padding: 9px 14px; border: 1px solid rgba(255,255,255,0.12); border-radius: 4px; background: rgba(255,255,255,0.03); color: var(--text-secondary); cursor: pointer;">Wszystkie</button>
        <?php foreach ($categories as $category => $label): ?>
            <button type="button" class="article-filter" data-category="<?= htmlspecialchars($category) ?>" aria-pressed="false" style="padding: 9px 14px; border: 1px solid rgba(255,255,255,0.12); border-radius: 4px; background: rgba(255,255,255,0.03); color: var(--text-secondary); cursor: pointer;">
                <?= htmlspecialchars($label) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 22px; margin-bottom: 30px;">
        <?php foreach ($articles as $item): ?>
            <article class="dash-card article-card" data-category="<?= htmlspecialchars($item['category']) ?>" style="padding: 0; overflow: hidden; border-left: 3px solid <?= htmlspecialchars($item['accent']) ?>; background: linear-gradient(135deg, rgba(10,14,24,0.96), rgba(18,18,30,0.96));">
                <figure style="height: 180px; margin: 0; position: relative; overflow: hidden; border-bottom: 1px solid rgba(255,255,255,0.08);">
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['image_alt']) ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                    <figcaption style="position: absolute; right: 8px; bottom: 8px; padding: 4px 7px; color: rgba(255,255,255,0.88); background: rgba(0,0,0,0.62); border-radius: 3px; font-size: 0.65rem;">
                        <?= htmlspecialchars($item['image_credit']) ?>
                    </figcaption>
                </figure>
                <div style="padding: 18px 18px 0;">
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 12px; flex-wrap: wrap;">
                        <span style="display: inline-block; padding: 6px 10px; border-radius: 999px; font-size: 0.68rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-white); background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                            <?= htmlspecialchars($item['tag']) ?>
                        </span>
                        <span style="font-size: 0.72rem; color: var(--text-muted);">
                            <?= htmlspecialchars($item['meta']) ?>
                        </span>
                    </div>
                </div>

                <div style="margin: 0 18px 0; height: 8px; border-radius: 999px; background: <?= htmlspecialchars($item['accent']) ?>; opacity: 0.9;"></div>

                <div style="padding: 20px 18px 20px;">
                    <h2 style="margin: 0 0 12px; font-size: 1.18rem; color: var(--text-white); font-family: var(--font-heading); line-height: 1.4;">
                        <?= htmlspecialchars($item['title']) ?>
                    </h2>

                    <p style="margin: 0; color: var(--text-secondary); line-height: 1.8;">
                        <?= htmlspecialchars($item['summary']) ?>
                    </p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <div class="dash-card" style="padding: 24px; background: rgba(9,14,23,0.92);">
        <div style="font-size: 0.72rem; letter-spacing: 0.16em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 18px;">
            Czytaj też
        </div>

        <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px;">
            <?php foreach ($related as $item): ?>
                <div class="related-card" data-category="<?= htmlspecialchars($item['category']) ?>" style="padding: 16px 18px; border-radius: 14px; border: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.02);">
                    <div style="font-size: 0.7rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--neon-cyan); margin-bottom: 8px;">
                        <?= htmlspecialchars($item['tag']) ?>
                    </div>
                    <div style="color: var(--text-white); line-height: 1.7; font-size: 1rem;">
                        <?= htmlspecialchars($item['title']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .article-filter.active {
        border-color: rgba(97, 218, 251, 0.45) !important;
        background: rgba(97, 218, 251, 0.12) !important;
        color: var(--text-white) !important;
    }

    .article-card[hidden],
    .related-card[hidden] {
        display: none !important;
    }
</style>

<script>
    document.querySelectorAll('.article-filter').forEach((button) => {
        button.addEventListener('click', () => {
            const category = button.dataset.category;

            document.querySelectorAll('.article-filter').forEach((filter) => {
                const active = filter === button;
                filter.classList.toggle('active', active);
                filter.setAttribute('aria-pressed', String(active));
            });

            document.querySelectorAll('.article-card, .related-card').forEach((card) => {
                card.hidden = category !== 'all' && card.dataset.category !== category;
            });
        });
    });
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
