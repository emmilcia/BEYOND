<?php
require_once __DIR__ . '/../config/config.php';

// Jeśli podstrona nie ustawiła własnego tytułu, używamy domyślnego
if (!isset($pageTitle)) {
    $pageTitle = SITE_TAGLINE;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> — <?= SITE_NAME ?></title>

    <!-- Fonty Google: Space Grotesk (nagłówki), Plus Jakarta Sans (UI), Inter (tekst) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Warstwa animowanych gwiazd (CSS) -->
    <div class="stars-overlay"></div>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="main-content">
