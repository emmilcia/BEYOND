<?php
/**
 * BEYOND — Konfiguracja projektu
 * Prosty plik konfiguracyjny przechowujący podstawowe dane strony.
 */

// Nazwa projektu
define('SITE_NAME', 'BEYOND');
define('SITE_TAGLINE', 'Portal Astronomiczny & Eksploracja Kosmosu');

// Pomocnicza funkcja do sprawdzania, czy dana podstrona jest aktywna (do zaznaczania w menu)
function isActive($pageName, $currentPage) {
    return ($pageName === $currentPage) ? 'active' : '';
}
