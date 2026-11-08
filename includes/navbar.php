<?php
// Sprawdzamy nazwę bieżącego pliku, żeby podświetlić właściwy link w menu
$currentScript = basename($_SERVER['PHP_SELF']);
?>
<header class="navbar-wrapper">
    <nav class="navbar container">
        <a href="index.php" class="brand-logo">
            <span class="logo-icon">🪐</span>
            <span class="logo-text">BEYOND</span>
            <span class="logo-badge">COSMOS</span>
        </a>

        <!-- Przycisk hamburgera — widoczny tylko na mobile -->
        <button class="nav-toggle" id="navToggle" aria-label="Otwórz menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="index.php" class="<?= isActive('index.php', $currentScript) ?>">Główna</a></li>
            <li><a href="uklad.php" class="<?= isActive('uklad.php', $currentScript) ?>">Układ Słoneczny</a></li>
            <li><a href="apod.php" class="<?= isActive('apod.php', $currentScript) ?>">Zdjęcie dnia (APOD)</a></li>
            <li><a href="odkrycia.php" class="<?= isActive('odkrycia.php', $currentScript) ?>">Odkrycia</a></li>
            <li><a href="ciekawostki.php" class="<?= isActive('ciekawostki.php', $currentScript) ?>">Ciekawostki</a></li>
            <li><a href="misje.php" class="<?= isActive('misje.php', $currentScript) ?>">Misje kosmiczne</a></li>
        </ul>
    </nav>
</header>
