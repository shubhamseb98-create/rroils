<?php

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$requestPath = rawurldecode($requestPath);
$requestFile = __DIR__ . $requestPath;

if ($requestPath !== '/' && is_file($requestFile)) {
    return false;
}

if ($requestPath === '/') {
    require __DIR__ . '/index.php';
    return;
}

$pageName = trim($requestPath, '/');
if (preg_match('/^[A-Za-z0-9_-]+$/', $pageName)) {
    $pageFile = __DIR__ . '/' . $pageName . '.php';
    if (is_file($pageFile)) {
        require $pageFile;
        return;
    }
}

http_response_code(404);
require __DIR__ . '/404.php';