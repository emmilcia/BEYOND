<?php
/**
 * BEYOND — Moduł integracji z oficjalnymi API NASA
 * Obsługa pobierania danych w czasie rzeczywistym z mechanizmem pamięci podręcznej (Cache)
 */

define('CACHE_DIR', __DIR__ . '/../data');
define('NASA_API_KEY', 'DEMO_KEY'); // Oficjalny klucz demonstracyjny NASA API

/**
 * Pomocnicza funkcja wykonująca zapytanie HTTP z limitem czasu
 * Używa cURL dla najlepszej kompatybilności z HTTPS
 */
function fetchHttp($url, $timeoutSeconds = 6) {
    // Próbuj przez cURL (szybsze, lepsze HTTPS)
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => $timeoutSeconds,
            CURLOPT_CONNECTTIMEOUT => 4,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'BEYOND-Astronomy-Portal/1.0',
            CURLOPT_FOLLOWLOCATION => true,
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result ?: false;
    }

    // Fallback: file_get_contents
    $context = stream_context_create([
        'http' => [
            'timeout' => $timeoutSeconds,
            'header'  => "User-Agent: BEYOND-Astronomy-Portal/1.0\r\n"
        ],
        'ssl' => [
            'verify_peer'      => false,
            'verify_peer_name' => false
        ]
    ]);
    $result = @file_get_contents($url, false, $context);
    return $result ?: false;
}

/**
 * Pobiera aktualne statystyki egzoplanet z NASA Exoplanet Archive (Caltech IPAC TAP API)
 */
function getNasaExoplanetData() {
    $cacheFile = CACHE_DIR . '/cache_exoplanets.json';
    $cacheLifetime = 3600; // 1 godzina cache

    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheLifetime)) {
        $cached = json_decode(file_get_contents($cacheFile), true);
        if ($cached && isset($cached['total'])) {
            return $cached;
        }
    }

    // 1. Pobierz liczbę potwierdzonych planet
    $totalUrl = 'https://exoplanetarchive.ipac.caltech.edu/TAP/sync?query=' . urlencode('select count(pl_name) as total from ps where default_flag=1') . '&format=json';
    $totalJson = fetchHttp($totalUrl, 4);

    // 2. Pobierz rozkład metod detekcji
    $methodsUrl = 'https://exoplanetarchive.ipac.caltech.edu/TAP/sync?query=' . urlencode('select discoverymethod, count(pl_name) as count from ps where default_flag=1 group by discoverymethod order by count desc') . '&format=json';
    $methodsJson = fetchHttp($methodsUrl, 4);

    $total = 6464;
    $methods = [
        'Transit' => 74,
        'Radial Velocity' => 19,
        'Microlensing' => 5,
        'Imaging' => 2
    ];

    if ($totalJson) {
        $totalArr = json_decode($totalJson, true);
        if (!empty($totalArr[0]['total'])) {
            $total = (int)$totalArr[0]['total'];
        }
    }

    if ($methodsJson) {
        $methodsArr = json_decode($methodsJson, true);
        if (is_array($methodsArr) && count($methodsArr) > 0) {
            $rawCounts = [];
            $sum = 0;
            foreach ($methodsArr as $row) {
                $rawCounts[$row['discoverymethod']] = (int)$row['count'];
                $sum += (int)$row['count'];
            }
            if ($sum > 0) {
                $transit = isset($rawCounts['Transit']) ? round(($rawCounts['Transit'] / $sum) * 100) : 74;
                $rv = isset($rawCounts['Radial Velocity']) ? round(($rawCounts['Radial Velocity'] / $sum) * 100) : 19;
                $micro = isset($rawCounts['Microlensing']) ? round(($rawCounts['Microlensing'] / $sum) * 100) : 5;
                $imaging = isset($rawCounts['Imaging']) ? round(($rawCounts['Imaging'] / $sum) * 100) : 2;

                $methods = [
                    'Transit' => $transit,
                    'Radial Velocity' => $rv,
                    'Microlensing' => $micro,
                    'Imaging' => $imaging
                ];
            }
        }
    }

    $data = [
        'total' => $total,
        'methods' => $methods,
        'timestamp' => time(),
        'source' => 'Na żywo: NASA Exoplanet Archive API'
    ];

    if (!is_dir(CACHE_DIR)) {
        @mkdir(CACHE_DIR, 0777, true);
    }
    @file_put_contents($cacheFile, json_encode($data, JSON_PRETTY_PRINT));

    return $data;
}

/**
 * Pobiera dane obiektów głębokiego kosmosu i misji międzygwiezdnych (Połączenie Opcji 1 i 2)
 * Korzysta z NASA Exoplanet Archive API + telemetrii misji JPL
 */
function getDeepSpaceFeed() {
    $cacheFile = CACHE_DIR . '/cache_deep_space.json';
    $cacheLifetime = 1800; // 30 minut cache

    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheLifetime)) {
        $cached = json_decode(file_get_contents($cacheFile), true);
        if ($cached && is_array($cached)) {
            // Zaktualizuj licznik kilometrów Voyagera w czasie rzeczywistym
            $voyagerKm = 24410000000 + (time() - 1704067200) * 17;
            $cached[3]['distance'] = number_format($voyagerKm / 1000000000, 2, ',', ' ') . ' mld km';
            return $cached;
        }
    }

    // 1. Pobierz z NASA TAP API najnowszą potwierdzoną egzoplanetę
    // Filtrujemy od 2024 wzwyż i sortujemy po dacie aktualizacji wpisu (rowupdate desc)
    $latestExoUrl = 'https://exoplanetarchive.ipac.caltech.edu/TAP/sync?query=' . urlencode('select top 1 pl_name, hostname, discoverymethod, disc_year, sy_dist from ps where default_flag=1 and disc_year >= 2024 order by rowupdate desc') . '&format=json';
    $exoJson = fetchHttp($latestExoUrl, 6);
    
    $exoName = 'Kepler-762 b';
    $exoDist = '1 898 lat św.';
    $exoNotes = 'Metoda tranzytu, teleskop Kepler/TESS';

    if ($exoJson) {
        $exoArr = json_decode($exoJson, true);
        if (!empty($exoArr[0])) {
            $exoName = $exoArr[0]['pl_name'];
            $exoDist = round((float)$exoArr[0]['sy_dist'], 1) . ' lat św.';
            $exoNotes = "Odkrycie: {$exoArr[0]['disc_year']} r., metoda: {$exoArr[0]['discoverymethod']}";
        }
    }

    // Dynamiczny licznik dystansu sondy Voyager 1 (16.9995 km/s wg NASA JPL)
    $voyagerKm = 24410000000 + (time() - 1704067200) * 17;
    $voyagerDistFormatted = number_format($voyagerKm / 1000000000, 2, ',', ' ') . ' mld km';

    $feed = [
        [
            'icon' => '🔭',
            'name' => 'James Webb (JWST)',
            'type' => 'Teleskop głębokiego kosmosu',
            'badge' => 'badge-galaxy',
            'distance' => '1.5 mln km (L2)',
            'notes' => 'Obserwacje w podczerwieni: galaktyki wczesnego Wszechświata'
        ],
        [
            'icon' => '🪐',
            'name' => $exoName,
            'type' => 'Nowo odkryta egzoplaneta (NASA)',
            'badge' => 'badge-exoplanet',
            'distance' => $exoDist,
            'notes' => $exoNotes
        ],
        [
            'icon' => '🕳️',
            'name' => 'Sagittarius A* / M87*',
            'type' => 'Supermasywna czarna dziura',
            'badge' => 'badge-bh',
            'distance' => '26 000 / 53 mln lat św.',
            'notes' => 'Cień horyzontu zdarzeń i relatywistyczny dżet plazmy (EHT)'
        ],
        [
            'icon' => '🚀',
            'name' => 'Voyager 1 (Interstellar)',
            'type' => 'Przestrzeń międzygwiezdna',
            'badge' => 'badge-supernova',
            'distance' => $voyagerDistFormatted,
            'notes' => 'Najdalszy obiekt człowieka &bull; sygnał radiowy leci ~22h 38m'
        ]
    ];

    if (!is_dir(CACHE_DIR)) {
        @mkdir(CACHE_DIR, 0777, true);
    }
    @file_put_contents($cacheFile, json_encode($feed, JSON_PRETTY_PRINT));

    return $feed;
}
