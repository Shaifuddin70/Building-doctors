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
        'image' => rtrim($config['domain'], '/') . '/assets/img/logo-full.png',
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

/** Inline SVG icon markup (decorative; pair with an aria-label on the parent link). */
function icon(string $name): string
{
    $stroke = 'fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';

    return match ($name) {
        'phone' => '<svg viewBox="0 0 24 24" aria-hidden="true" ' . $stroke . '><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/></svg>',
        'whatsapp' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.39-1.47-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.62-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.21 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.18-1.41-.07-.13-.27-.2-.57-.35Zm-5.42 7.4h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 6.99c0 5.45-4.44 9.88-9.88 9.88Zm8.41-18.3A11.81 11.81 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.89c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.68 1.45h.01c6.55 0 11.89-5.34 11.89-11.89 0-3.18-1.24-6.16-3.48-8.41Z"/></svg>',
        'instagram' => '<svg viewBox="0 0 24 24" aria-hidden="true" ' . $stroke . '><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4.2"/><circle cx="17.4" cy="6.6" r="1.1" fill="currentColor" stroke="none"/></svg>',
        'chat' => '<svg viewBox="0 0 24 24" aria-hidden="true" ' . $stroke . '><path d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8Z"/></svg>',
        'close' => '<svg viewBox="0 0 24 24" aria-hidden="true" ' . $stroke . '><path d="M18 6 6 18M6 6l12 12"/></svg>',
        'blueprint' => '<svg viewBox="0 0 24 24" aria-hidden="true" ' . $stroke . '><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-7h6v7"/><path d="M3 21h18"/></svg>',
        'approved' => '<svg viewBox="0 0 24 24" aria-hidden="true" ' . $stroke . '><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="m9 14 2 2 4-4"/></svg>',
        'license' => '<svg viewBox="0 0 24 24" aria-hidden="true" ' . $stroke . '><circle cx="12" cy="9" r="6"/><path d="m9 14.5-1.5 7L12 19l4.5 2.5-1.5-7"/><path d="m9.5 9 1.8 1.8L14.5 7.5"/></svg>',
        'clock' => '<svg viewBox="0 0 24 24" aria-hidden="true" ' . $stroke . '><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>',
        default => '',
    };
}
