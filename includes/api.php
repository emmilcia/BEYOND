<?php
// Folder na pliki cache (żeby nie odpytywać API przy każdym wejściu na stronę)
define('CACHE_DIR', __DIR__ . '/../data');

// Klucz NASA API — DEMO_KEY działa bez rejestracji, limit: 30 req/h
define('NASA_API_KEY', 'DEMO_KEY');

// Wysyła żądanie HTTP i zwraca odpowiedź jako string (albo false jeśli błąd)
// Używa cURL, z fallbackiem na file_get_contents
function fetchHttp($url, $timeout = 6) {
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => $timeout,
            CURLOPT_CONNECTTIMEOUT => 4,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'BEYOND-Astronomy-Portal/1.0',
            CURLOPT_FOLLOWLOCATION => true,
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result ?: false;
    }

    // Zapasowy sposób pobierania gdy brak cURL
    $ctx = stream_context_create([
        'http' => ['timeout' => $timeout, 'header' => "User-Agent: BEYOND-Astronomy-Portal/1.0\r\n"],
        'ssl'  => ['verify_peer' => false, 'verify_peer_name' => false],
    ]);
    return @file_get_contents($url, false, $ctx) ?: false;
}

// Sprawdza czy plik cache jest aktualny (nie starszy niż $maxAge sekund)
function cacheValid($file, $maxAge) {
    return file_exists($file) && (time() - filemtime($file) < $maxAge);
}

// Pobiera statystyki egzoplanet z NASA Exoplanet Archive (Caltech IPAC TAP API)
// Cache: 1 godzina — dane zmieniają się rzadko
function getNasaExoplanetData() {
    $cacheFile = CACHE_DIR . '/cache_exoplanets.json';

    // Jeśli cache jest świeży, zwróć zapisane dane
    if (cacheValid($cacheFile, 3600)) {
        $cached = json_decode(file_get_contents($cacheFile), true);
        if ($cached && isset($cached['total'])) {
            return $cached;
        }
    }

    // Zapytanie 1: łączna liczba potwierdzonych planet
    $urlTotal = 'https://exoplanetarchive.ipac.caltech.edu/TAP/sync?query='
        . urlencode('select count(pl_name) as total from ps where default_flag=1')
        . '&format=json';

    // Zapytanie 2: podział według metody odkrycia
    $urlMethods = 'https://exoplanetarchive.ipac.caltech.edu/TAP/sync?query='
        . urlencode('select discoverymethod, count(pl_name) as count from ps where default_flag=1 group by discoverymethod order by count desc')
        . '&format=json';

    // Wartości domyślne na wypadek gdyby API nie odpowiedziało
    $total   = 5700;
    $methods = ['Transit' => 74, 'Radial Velocity' => 19, 'Microlensing' => 5, 'Imaging' => 2];

    $jsonTotal = fetchHttp($urlTotal);
    if ($jsonTotal) {
        $arr = json_decode($jsonTotal, true);
        if (!empty($arr[0]['total'])) {
            $total = (int) $arr[0]['total'];
        }
    }

    $jsonMethods = fetchHttp($urlMethods);
    if ($jsonMethods) {
        $arr = json_decode($jsonMethods, true);
        if (is_array($arr) && count($arr) > 0) {
            $suma = 0;
            $surowe = [];
            foreach ($arr as $wiersz) {
                $surowe[$wiersz['discoverymethod']] = (int) $wiersz['count'];
                $suma += (int) $wiersz['count'];
            }
            if ($suma > 0) {
                $methods = [
                    'Transit'         => round(($surowe['Transit']          ?? 0) / $suma * 100),
                    'Radial Velocity' => round(($surowe['Radial Velocity']  ?? 0) / $suma * 100),
                    'Microlensing'    => round(($surowe['Microlensing']     ?? 0) / $suma * 100),
                    'Imaging'         => round(($surowe['Imaging']          ?? 0) / $suma * 100),
                ];
            }
        }
    }

    $data = [
        'total'   => $total,
        'methods' => $methods,
        'zrodlo'  => 'NASA Exoplanet Archive (Caltech IPAC TAP API)',
    ];

    // Zapisz do cache
    if (!is_dir(CACHE_DIR)) @mkdir(CACHE_DIR, 0777, true);
    @file_put_contents($cacheFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    return $data;
}

// Pobiera dane do panelu "Głęboki Kosmos" na głównym pulpicie
// Cache: 30 minut
function getDeepSpaceFeed() {
    $cacheFile = CACHE_DIR . '/cache_deep_space.json';

    if (cacheValid($cacheFile, 1800)) {
        $cached = json_decode(file_get_contents($cacheFile), true);
        if ($cached && is_array($cached)) {
            // Dystans Voyagera liczymy na bieżąco z fizyki (prędkość ~17 km/s)
            // — nie trzymamy go w cache, żeby zawsze był aktualny co do sekundy
            $cached[3]['distance'] = voyagerDystans();
            return $cached;
        }
    }

    // Pobierz najnowszą odkrytą egzoplanetę (od 2024, sortuj po dacie aktualizacji wpisu)
    $urlExo = 'https://exoplanetarchive.ipac.caltech.edu/TAP/sync?query='
        . urlencode('select top 1 pl_name, hostname, discoverymethod, disc_year, sy_dist from ps where default_flag=1 and disc_year >= 2024 order by rowupdate desc')
        . '&format=json';

    // Wartości domyślne gdyby API nie odpowiedziało w czasie
    $exoNazwa = 'TOI-6647 b';
    $exoDyst  = '—';
    $exoOpis  = 'Odkrycie: 2026 r., metoda: Transit (TESS)';

    $json = fetchHttp($urlExo);
    if ($json) {
        $arr = json_decode($json, true);
        if (!empty($arr[0])) {
            $exoNazwa = $arr[0]['pl_name'];
            $exoDyst  = round((float) $arr[0]['sy_dist'], 1) . ' lat św.';
            $exoOpis  = "Odkrycie: {$arr[0]['disc_year']} r., metoda: {$arr[0]['discoverymethod']}";
        }
    }

    $feed = [
        // Teleskop Webba — stały opis (NASA nie udostępnia API "co teraz obserwuje")
        [
            'icon'     => '🔭',
            'name'     => 'James Webb (JWST)',
            'type'     => 'Teleskop głębokiego kosmosu',
            'badge'    => 'badge-galaxy',
            'distance' => '1,5 mln km (punkt L2)',
            'notes'    => 'Obserwacje w podczerwieni: galaktyki wczesnego Wszechświata',
        ],
        // Najnowsza egzoplaneta — dane z NASA Exoplanet Archive API
        [
            'icon'     => '🪐',
            'name'     => $exoNazwa,
            'type'     => 'Ostatnio odkryta egzoplaneta',
            'badge'    => 'badge-exoplanet',
            'distance' => $exoDyst,
            'notes'    => $exoOpis,
        ],
        // Czarne dziury — jedyne dwie sfotografowane przez ludzkość (EHT 2019 i 2022)
        [
            'icon'     => '🕳️',
            'name'     => 'Sagittarius A* / M87*',
            'type'     => 'Supermasywna czarna dziura',
            'badge'    => 'badge-bh',
            'distance' => '26 000 / 53 mln lat św.',
            'notes'    => 'Cień horyzontu zdarzeń uchwycony przez teleskop EHT',
        ],
        // Voyager 1 — dystans obliczany na żywo ze wzoru (prędkość JPL NASA)
        [
            'icon'     => '🚀',
            'name'     => 'Voyager 1 (przestrzeń międzygwiezdna)',
            'type'     => 'Sonda NASA',
            'badge'    => 'badge-supernova',
            'distance' => voyagerDystans(),
            'notes'    => 'Najdalej od Ziemi obiekt stworzony przez człowieka &bull; sygnał radiowy: ~22h 38m',
        ],
    ];

    if (!is_dir(CACHE_DIR)) @mkdir(CACHE_DIR, 0777, true);
    @file_put_contents($cacheFile, json_encode($feed, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    return $feed;
}

// Oblicza aktualny dystans Voyagera 1 na podstawie prędkości z JPL NASA (~17 km/s)
// Punkt startowy: 24,41 mld km w dniu 1 stycznia 2024
function voyagerDystans() {
    $kmNa1Styczen2024 = 24_410_000_000;
    $predkoscKmS      = 17; // km/s wg NASA JPL
    $sekundy          = time() - mktime(0, 0, 0, 1, 1, 2024);
    $km               = $kmNa1Styczen2024 + $sekundy * $predkoscKmS;
    return number_format($km / 1_000_000_000, 2, ',', ' ') . ' mld km';
}

// Pobiera zdjęcie dnia z NASA APOD.
// Od października 2026 endpoint api.nasa.gov/planetary/apod zaczyna zwracać
// logo NASA zamiast realnego zdjęcia. Dlatego jako główne źródło używamy
// oficjalnego RSS APOD ze strony science.nasa.gov i dopiero potem fallbacku lokalnego.
function isBrokenApodPayload(array $decoded): bool {
    $title = strtolower((string)($decoded['title'] ?? ''));
    $url = (string)($decoded['url'] ?? '');
    $hdUrl = (string)($decoded['hdurl'] ?? '');

    if ($title === 'nasa science' || $title === 'nasa logo') {
        return true;
    }

    foreach ([$url, $hdUrl] as $candidate) {
        if ($candidate !== '' && stripos($candidate, 'nasa-logo') !== false) {
            return true;
        }
    }

    return false;
}

function fetchApodFromScienceFeed(): ?array {
    $feedUrl = 'https://science.nasa.gov/feed/apod-basic/';
    $xml = fetchHttp($feedUrl, 12);

    if (!$xml) {
        return null;
    }

    $feed = @simplexml_load_string($xml);
    if (!$feed || !isset($feed->channel->item)) {
        return null;
    }

    $namespace = 'https://science.nasa.gov/apod/';

    foreach ($feed->channel->item as $item) {
        $title = trim((string)$item->title);
        $pubDate = trim((string)$item->pubDate);
        $imageUrl = '';

        if (isset($item->children($namespace)->hdurl)) {
            $imageUrl = trim((string)$item->children($namespace)->hdurl);
        }

        if ($imageUrl === '' && isset($item->enclosure)) {
            $imageUrl = trim((string)$item->enclosure['url']);
        }

        $description = trim((string)$item->description);
        if ($description === '' && isset($item->children($namespace)->explanation)) {
            $description = trim((string)$item->children($namespace)->explanation);
        }

        $copyright = '';
        if (isset($item->children($namespace)->copyright)) {
            $copyright = trim(strip_tags((string)$item->children($namespace)->copyright));
        }

        if ($title === '' || $imageUrl === '') {
            continue;
        }

        if (stripos($title, 'nasa science') !== false || stripos($imageUrl, 'nasa-logo') !== false) {
            continue;
        }

        if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            continue;
        }

        $safeExplanation = strip_tags($description);
        $safeExplanation = preg_replace('/\s+/', ' ', $safeExplanation);

        return [
            'title' => $title,
            'date' => $pubDate !== '' ? date('Y-m-d', strtotime($pubDate)) : date('Y-m-d'),
            'explanation' => $safeExplanation !== '' ? $safeExplanation : 'Opis nie jest dostępny.',
            'media_type' => 'image',
            'url' => $imageUrl,
            'copyright' => $copyright !== '' ? $copyright : 'NASA'
        ];
    }

    return null;
}

function getApodData() {
    $cacheFile = CACHE_DIR . '/cache_apod.json';
    $cacheLifetime = 3600;

    $fallback = [
        'title' => 'Kosmiczny krajobraz',
        'date' => date('Y-m-d'),
        'explanation' => 'NASA API chwilowo nie odpowiada. Wczytano lokalne zdjęcie zapasowe.',
        'media_type' => 'image',
        'url' => 'images/space-bg.jpg',
        'copyright' => 'BEYOND'
    ];

    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheLifetime)) {
        $cached = json_decode(file_get_contents($cacheFile), true);
        $isFallback = is_array($cached)
            && (($cached['title'] ?? '') === 'Kosmiczny krajobraz' || ($cached['title'] ?? '') === 'Zdjęcie dnia')
            && (
                stripos((string)($cached['explanation'] ?? ''), 'chwilowo nie odpowiada') !== false
                || stripos((string)($cached['explanation'] ?? ''), 'Brak danych z NASA') !== false
            );

        if (is_array($cached) && !empty($cached['title']) && !$isFallback) {
            return $cached;
        }
    }

    $feedData = fetchApodFromScienceFeed();
    if (is_array($feedData) && !isBrokenApodPayload($feedData)) {
        if (!is_dir(CACHE_DIR)) {
            @mkdir(CACHE_DIR, 0777, true);
        }
        @file_put_contents($cacheFile, json_encode($feedData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return $feedData;
    }

    return $fallback;
}
