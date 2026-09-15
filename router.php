<?php
declare(strict_types=1);

/**
 * Router for PHP's built-in server (Apache uses .htaccess instead).
 * Start with: php -S localhost:8080 router.php
 */
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');
$uri = rtrim($uri, '/') ?: '/';
$path = __DIR__ . $uri;

// Serve real files (css, js, images, existing .php, etc.)
if ($uri !== '/' && is_file($path)) {
    return false;
}

// Clean URLs: /services -> services.php
if ($uri !== '/') {
    $phpFile = $path . '.php';
    if (is_file($phpFile)) {
        require $phpFile;
        return true;
    }

    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    echo "404 Not Found\n";
    return true;
}

require __DIR__ . '/index.php';
return true;
