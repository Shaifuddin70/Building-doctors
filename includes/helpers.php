<?php
declare(strict_types=1);

$config = require __DIR__ . '/config.php';
$services = require dirname(__DIR__) . '/content/services.php';
$portfolio = require dirname(__DIR__) . '/content/portfolio.php';
$testimonials = require dirname(__DIR__) . '/content/testimonials.php';

/**
 * @param array{title?:string,description?:string,path?:string,og_image?:string} $meta
 */
function render_seo(array $meta, array $config): void
{
    $site = $config['site_name'];
    $title = $meta['title'] ?? $site;
    $description = $meta['description'] ?? 'Architectural drafting, permit drawings, and structural reports for homeowners and contractors across Greater Ottawa.';
    $path = $meta['path'] ?? '/';
    $canonical = rtrim($config['domain'], '/') . $path;
    $ogImage = $meta['og_image'] ?? rtrim($config['domain'], '/') . '/assets/img/og-default.png';
    $fullTitle = str_contains($title, $site) ? $title : $title . ' | ' . $site;

    echo '<title>' . htmlspecialchars($fullTitle, ENT_QUOTES, 'UTF-8') . "</title>\n";
    echo '<meta name="description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . "\">\n";
    echo '<link rel="canonical" href="' . htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') . "\">\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:site_name" content="' . htmlspecialchars($site, ENT_QUOTES, 'UTF-8') . "\">\n";
    echo '<meta property="og:title" content="' . htmlspecialchars($fullTitle, ENT_QUOTES, 'UTF-8') . "\">\n";
    echo '<meta property="og:description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . "\">\n";
    echo '<meta property="og:url" content="' . htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') . "\">\n";
    echo '<meta property="og:image" content="' . htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') . "\">\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . htmlspecialchars($fullTitle, ENT_QUOTES, 'UTF-8') . "\">\n";
    echo '<meta name="twitter:description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . "\">\n";
}

function json_ld_business(array $config): string
{
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => $config['site_name'],
        'description' => 'Architectural drafting, permit drawings, and structural engineering reports for Greater Ottawa.',
        'url' => $config['domain'],
        'telephone' => $config['phone_tel'],
        'email' => $config['email'],
        'image' => rtrim($config['domain'], '/') . '/assets/img/logo-mark.png',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $config['address']['street'],
            'addressLocality' => $config['address']['city'],
            'addressRegion' => $config['address']['region'],
            'postalCode' => $config['address']['postal'],
            'addressCountry' => 'CA',
        ],
        'areaServed' => array_map(
            static fn(string $area): array => ['@type' => 'Place', 'name' => $area],
            $config['service_areas']
        ),
        'priceRange' => '$$',
        'sameAs' => array_values(array_filter($config['social'])),
    ];

    return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function is_active(string $slug, string $current): string
{
    return $slug === $current ? ' is-active' : '';
}
