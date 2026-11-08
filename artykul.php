<?php
$articles = require __DIR__ . '/includes/articles.php';
$slug = $_GET['slug'] ?? '';
$article = null;

if (is_string($slug)) {
    foreach ($articles as $item) {
        if ($item['slug'] === $slug) {
            $article = $item;
            break;
        }
    }
}

if ($article === null) {
    http_response_code(404);
}

$pageTitle = $article['title'] ?? 'Nie znaleziono artykułu';
require_once __DIR__ . '/includes/header.php';
?>

<div class="container" style="max-width: 1000px;">
    <a href="odkrycia.php" style="display: inline-block; margin: 20px 0; color: var(--neon-cyan); text-decoration: none;">
        &larr; Artykuły
    </a>

    <?php if ($article === null): ?>
        <section style="padding: 24px 0 56px;">
            <h1 style="color: var(--text-white); font-family: var(--font-heading);">Nie znaleziono artykułu</h1>
            <p style="color: var(--text-secondary);">Ten tekst nie istnieje albo jego adres jest nieaktualny.</p>
        </section>
    <?php else: ?>
        <article>
            <header style="max-width: 780px; padding: 18px 0 26px;">
                <div style="margin-bottom: 14px; color: var(--neon-cyan); font-size: 0.78rem; letter-spacing: 0.1em; text-transform: uppercase;">
                    <?= htmlspecialchars($article['tag']) ?>
                </div>
                <h1 style="margin: 0 0 16px; color: var(--text-white); font-family: var(--font-heading); font-size: clamp(2rem, 5vw, 3.4rem); line-height: 1.15;">
                    <?= htmlspecialchars($article['title']) ?>
                </h1>
                <p style="margin: 0 0 12px; color: var(--text-secondary); font-size: 1.1rem; line-height: 1.75;">
                    <?= htmlspecialchars($article['summary']) ?>
                </p>
                <div style="color: var(--text-muted); font-size: 0.82rem;">
                    <?= htmlspecialchars($article['meta']) ?>
                </div>
            </header>

            <?php if (!empty($article['image'])): ?>
                <figure style="margin: 0 0 30px;">
                    <img src="<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['image_alt']) ?>" style="display: block; width: 100%; max-height: 520px; object-fit: cover; border-radius: 6px;">
                    <figcaption style="margin-top: 8px; color: var(--text-muted); font-size: 0.72rem; text-align: right;">
                        <?= htmlspecialchars($article['image_credit']) ?>
                    </figcaption>
                </figure>
            <?php endif; ?>

            <div style="max-width: 74ch; padding-bottom: 28px;">
                <?php foreach ($article['paragraphs'] as $paragraph): ?>
                    <p style="margin: 0 0 20px; color: var(--text-secondary); font-size: 1.05rem; line-height: 1.9;">
                        <?= htmlspecialchars($paragraph) ?>
                    </p>
                <?php endforeach; ?>
            </div>

            <a href="odkrycia.php" style="display: inline-block; margin-bottom: 48px; color: var(--neon-cyan); text-decoration: none;">
                &larr; Wróć do artykułów
            </a>
        </article>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>