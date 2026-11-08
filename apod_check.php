<?php
require __DIR__ . '/includes/api.php';
$data = getApodData();
echo $data['title'] . PHP_EOL;
echo $data['url'] . PHP_EOL;
