<?php
// Nazwa i opis strony
define('SITE_NAME', 'BEYOND');
define('SITE_TAGLINE', 'Portal Astronomiczny & Eksploracja Kosmosu');

// Sprawdza czy dany plik to aktywna podstrona (używane w menu nawigacyjnym)
function isActive($pageName, $currentPage) {
    return ($pageName === $currentPage) ? 'active' : '';
}
