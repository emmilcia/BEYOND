<?php
// Dołączamy plik konfiguracyjny
require_once __DIR__ . '/../config/config.php';

// Jeśli podstrona nie zdefiniowała swojego tytułu, używamy domyślnego
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
    
    <!-- Nowoczesne fonty Google (Plus Jakarta Sans, Space Grotesk, Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Główny arkusz stylów -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="stars-overlay"></div>
    
    <?php include __DIR__ . '/navbar.php'; ?>
    
    <!-- Główna zawartość strony -->
    <main class="main-content">
