<?php
declare(strict_types=1);

/** @var array $config */
/** @var array $meta */
/** @var string $currentPage */

require_once __DIR__ . '/helpers.php';

$pageClass = $pageClass ?? '';
$bodyClass = trim('page-' . ($currentPage ?? 'home') . ' ' . $pageClass);
?>
<!DOCTYPE html>
<html lang="en-CA">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#000000">
  <?php render_seo($meta ?? [], $config); ?>
  <link rel="icon" href="/assets/img/favicon.png?v=20261003" type="image/png">
  <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Serif+Display&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/main.css?v=20261003v">
  <?= json_ld_business($config) ?>
</head>
<body class="<?= e($bodyClass) ?>">
  <a class="skip-link" href="#main">Skip to content</a>

  <header class="site-header" data-header>
    <div class="container">
      <div class="header-inner">
        <a class="brand" href="/" aria-label="Building Doctors home">
          <img class="brand-mark" src="/assets/img/brand-mark.png?v=20261003" width="480" height="339" alt="">
          <span class="brand-text">
            <span class="brand-name">Building Doctors</span>
            <span class="brand-tag"><?= e($config['tagline']) ?></span>
          </span>
        </a>

        <div class="header-right">
          <nav class="nav d-none d-lg-flex" data-nav aria-label="Primary">
            <a class="nav-link<?= is_active('home', $currentPage) ?>" href="/">Home</a>
            <div class="nav-dropdown" data-nav-dropdown>
              <a class="nav-link nav-dropdown-toggle<?= is_active('services', $currentPage) ?>" href="/services" aria-haspopup="true" aria-expanded="false" aria-controls="services-menu">
                Services <?= icon('chevron-down') ?>
              </a>
              <div class="nav-dropdown-menu" id="services-menu">
                <div class="nav-dropdown-panel">
                  <?php foreach ($services as $service): ?>
                    <a class="nav-dropdown-item" href="/services#<?= e($service['id']) ?>">
                      <span class="nav-dropdown-icon"><?= service_icon($service['id']) ?></span>
                      <span class="nav-dropdown-text">
                        <span class="nav-dropdown-title"><?= e($service['title']) ?></span>
                        <span class="nav-dropdown-tagline"><?= e($service['tagline'] ?? '') ?></span>
                      </span>
                    </a>
                  <?php endforeach; ?>
                  <a class="nav-dropdown-all" href="/services">View all services <?= icon('arrow-right') ?></a>
                </div>
              </div>
            </div>
            <a class="nav-link<?= is_active('portfolio', $currentPage) ?>" href="/portfolio">Portfolio</a>
            <a class="nav-link<?= is_active('about', $currentPage) ?>" href="/about">About</a>
            <a class="nav-link<?= is_active('contact', $currentPage) ?>" href="/contact">Contact</a>
          </nav>

          <div class="header-actions">
            <a class="btn btn-outline btn-sm header-phone d-none d-lg-inline-flex" href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
            <a class="btn btn-primary btn-sm header-quote d-none d-lg-inline-flex" href="/contact">Get a Quote</a>
            <label class="hamburger nav-toggle d-lg-none" data-nav-toggle aria-label="Open menu">
              <input type="checkbox" data-nav-checkbox aria-controls="mobile-nav" aria-expanded="false">
              <svg viewBox="0 0 32 32" aria-hidden="true">
                <path
                  class="line line-top-bottom"
                  d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22"
                ></path>
                <path class="line" d="M7 16 27 16"></path>
              </svg>
            </label>
          </div>
        </div>
      </div>
    </div>
  </header>

  <?php
  $tickerItems = [
      'Design & Drafting',
      'Permit Drawings',
      'Home Additions',
      'Greater Ottawa Area',
      'P.Eng Licensed Engineers',
      'Basement Permits',
      'Site Plans',
      'Renovation Plans',
      'Committee of Adjustment',
      'Structural Reports',
  ];
  ?>
  <div class="ticker-wrap" aria-hidden="true">
    <div class="ticker-track">
      <?php for ($pass = 0; $pass < 2; $pass++): ?>
        <?php foreach ($tickerItems as $item): ?>
          <span class="ticker-item"><?= e($item) ?></span><span class="ticker-sep">✦</span>
        <?php endforeach; ?>
      <?php endfor; ?>
    </div>
  </div>

  <div class="nav-overlay" data-nav-overlay hidden></div>
  <aside class="mobile-nav" id="mobile-nav" data-mobile-nav aria-hidden="true">
    <nav class="mobile-nav-links" aria-label="Mobile">
      <a class="mobile-nav-link<?= is_active('home', $currentPage) ?>" href="/">Home</a>
      <?php $servicesOpen = $currentPage === 'services'; ?>
      <div class="mobile-nav-group<?= $servicesOpen ? ' is-expanded' : '' ?>" data-mobile-group>
        <div class="mobile-nav-row">
          <a class="mobile-nav-link<?= is_active('services', $currentPage) ?>" href="/services">Services</a>
          <button class="mobile-nav-expand" type="button" aria-expanded="<?= $servicesOpen ? 'true' : 'false' ?>" aria-controls="mobile-services" aria-label="<?= $servicesOpen ? 'Hide services' : 'Show services' ?>" data-mobile-expand>
            <?= icon('chevron-down') ?>
          </button>
        </div>
        <div class="mobile-nav-services" id="mobile-services"<?= $servicesOpen ? '' : ' hidden' ?>>
          <?php foreach ($services as $service): ?>
            <a href="/services#<?= e($service['id']) ?>">
              <span class="nav-dropdown-icon"><?= service_icon($service['id']) ?></span>
              <?= e($service['title']) ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <a class="mobile-nav-link<?= is_active('portfolio', $currentPage) ?>" href="/portfolio">Portfolio</a>
      <a class="mobile-nav-link<?= is_active('about', $currentPage) ?>" href="/about">About</a>
      <a class="mobile-nav-link<?= is_active('contact', $currentPage) ?>" href="/contact">Contact</a>
    </nav>
    <div class="mobile-nav-actions">
      <a class="btn btn-primary" href="/contact">Get a Quote</a>
      <a class="btn btn-outline" href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
    </div>
  </aside>

  <main id="main">
