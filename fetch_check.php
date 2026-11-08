<?php
require __DIR__ . '/includes/api.php';
$url = 'https://api.nasa.gov/planetary/apod?api_key=' . NASA_API_KEY;
$data = fetchHttp($url, 8);
if ($data === false) {
    echo 'FALSE';
} else {
    echo substr($data, 0, 500);
}
