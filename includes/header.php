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
  <meta name="theme-color" content="#0B1F33">
  <?php render_seo($meta ?? [], $config); ?>
  <link rel="icon" href="/assets/img/logo.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="/assets/img/logo-mark.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Source+Sans+3:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/main.css">
  <?= json_ld_business($config) ?>
</head>
<body class="<?= e($bodyClass) ?>">
  <a class="skip-link" href="#main">Skip to content</a>

  <header class="site-header" data-header>
    <div class="container header-inner">
      <a class="brand" href="/" aria-label="Building Doctors home">
        <img class="brand-mark" src="/assets/img/logo.svg" width="44" height="44" alt="">
        <span class="brand-text">
          <span class="brand-name">Building Doctors</span>
          <span class="brand-tag"><?= e($config['tagline']) ?></span>
        </span>
      </a>

      <div class="header-right">
        <nav class="nav" data-nav aria-label="Primary">
          <a class="nav-link<?= is_active('home', $currentPage) ?>" href="/">Home</a>
          <a class="nav-link<?= is_active('services', $currentPage) ?>" href="/services">Services</a>
          <a class="nav-link<?= is_active('portfolio', $currentPage) ?>" href="/portfolio">Portfolio</a>
          <a class="nav-link<?= is_active('about', $currentPage) ?>" href="/about">About</a>
          <a class="nav-link<?= is_active('contact', $currentPage) ?>" href="/contact">Contact</a>
        </nav>

        <div class="header-actions">
          <a class="btn btn-outline btn-sm header-phone" href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
          <a class="btn btn-primary btn-sm header-quote" href="/contact">Get a Quote</a>
          <label class="hamburger nav-toggle" data-nav-toggle aria-label="Open menu">
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
  </header>

  <div class="nav-overlay" data-nav-overlay hidden></div>
  <aside class="mobile-nav" id="mobile-nav" data-mobile-nav aria-hidden="true">
    <nav class="mobile-nav-links" aria-label="Mobile">
      <a href="/">Home</a>
      <a href="/services">Services</a>
      <a href="/portfolio">Portfolio</a>
      <a href="/about">About</a>
      <a href="/contact">Contact</a>
    </nav>
    <div class="mobile-nav-actions">
      <a class="btn btn-primary" href="/contact">Get a Quote</a>
      <a class="btn btn-outline" href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
    </div>
  </aside>

  <main id="main">
