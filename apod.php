<?php
/**
 * BEYOND — zdjęcie dnia (APOD).
 * Widok prezentuje dane pobrane przez funkcje z includes/api.php.
 */

$pageTitle = 'Zdjęcie dnia (APOD)';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/api.php';

$apod = getApodData();
$mediaType = $apod['media_type'] ?? 'image';
$mediaUrl = $apod['url'] ?? '';
$title = $apod['title'] ?? 'Zdjęcie dnia';
$date = $apod['date'] ?? date('Y-m-d');
$description = $apod['explanation'] ?? 'Opis nie jest dostępny.';
$copyright = $apod['copyright'] ?? 'NASA';
?>

<div class="container">
    <section class="page-hero" style="margin-bottom: 24px;">
        <div class="dashboard-topbar" style="margin-bottom: 0;">
            <div class="status-indicator">
                <span class="pulse-dot"></span>
                <span>NASA APOD</span>
            </div>
            <div class="sys-time"><?= htmlspecialchars($date) ?></div>
        </div>
    </section>

    <div class="dash-card" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 22px; flex-wrap: wrap;">
            <div>
                <div style="font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 6px;">
                    Astronomiczne zdjęcie dnia
                </div>
                <h1 style="font-family: var(--font-heading); font-size: clamp(2rem, 3vw, 3rem); margin: 0; color: var(--text-white);">
                    <?= htmlspecialchars($title) ?>
                </h1>
            </div>
            <div style="padding: 8px 12px; border: 1px solid rgba(0, 240, 255, 0.4); background: rgba(0, 240, 255, 0.08); border-radius: 999px; color: var(--neon-cyan); font-weight: 700; font-size: 0.8rem;">
                <?= htmlspecialchars($date) ?>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1.3fr 0.7fr; gap: 24px; align-items: start;">
            <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; overflow: hidden;">
                <?php if ($mediaType === 'video'): ?>
                    <video controls autoplay muted playsinline style="display: block; width: 100%; max-height: 720px; background: #000;">
                        <source src="<?= htmlspecialchars($mediaUrl) ?>" type="video/mp4">
                        Twoja przeglądarka nie obsługuje odtwarzania wideo.
                    </video>
                <?php else: ?>
                    <img src="<?= htmlspecialchars($mediaUrl) ?>" alt="<?= htmlspecialchars($title) ?>" style="display: block; width: 100%; height: auto; max-height: 720px; object-fit: cover;">
                <?php endif; ?>
            </div>

            <aside style="display: flex; flex-direction: column; gap: 16px;">
                <div style="padding: 18px; background: rgba(16, 26, 45, 0.7); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px;">
                    <div style="font-size: 0.72rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 10px;">
                        Informacje
                    </div>
                    <div style="color: var(--text-secondary); line-height: 1.7; font-size: 0.96rem;">
                        <strong style="color: var(--text-white);">Źródło:</strong> <?= htmlspecialchars($copyright) ?><br>
                        <strong style="color: var(--text-white);">Typ medium:</strong> <?= htmlspecialchars($mediaType) ?><br>
                        <strong style="color: var(--text-white);">Data:</strong> <?= htmlspecialchars($date) ?>
                    </div>
                </div>

                <div style="padding: 18px; background: rgba(0, 240, 255, 0.04); border: 1px solid rgba(0, 240, 255, 0.18); border-radius: 16px;">
                    <div style="font-size: 0.72rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 10px;">
                        Opis
                    </div>
                    <p style="margin: 0; color: var(--text-secondary); line-height: 1.8; font-size: 0.95rem;">
                        <?= nl2br(htmlspecialchars($description)) ?>
                    </p>
                </div>
            </aside>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
