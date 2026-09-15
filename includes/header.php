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

      <nav class="nav" data-nav aria-label="Primary">
        <a class="nav-link<?= is_active('home', $currentPage) ?>" href="/">Home</a>
        <a class="nav-link<?= is_active('services', $currentPage) ?>" href="/services.php">Services</a>
        <a class="nav-link<?= is_active('portfolio', $currentPage) ?>" href="/portfolio.php">Portfolio</a>
        <a class="nav-link<?= is_active('about', $currentPage) ?>" href="/about.php">About</a>
        <a class="nav-link<?= is_active('contact', $currentPage) ?>" href="/contact.php">Contact</a>
      </nav>

      <div class="header-actions">
        <a class="header-phone" href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
        <a class="btn btn-primary btn-sm header-quote" href="/contact.php">Get a Quote</a>
        <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>

    <div class="nav-overlay" data-nav-overlay hidden></div>
    <aside class="mobile-nav" id="mobile-nav" data-mobile-nav aria-hidden="true">
      <div class="mobile-nav-top">
        <span class="mobile-nav-title">Menu</span>
        <button class="nav-close" type="button" data-nav-close aria-label="Close menu">×</button>
      </div>
      <nav class="mobile-nav-links" aria-label="Mobile">
        <a href="/">Home</a>
        <a href="/services.php">Services</a>
        <a href="/portfolio.php">Portfolio</a>
        <a href="/about.php">About</a>
        <a href="/contact.php">Contact</a>
      </nav>
      <a class="btn btn-primary mobile-nav-cta" href="/contact.php">Get a Quote</a>
      <a class="btn btn-outline mobile-nav-phone" href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
    </aside>
  </header>

  <main id="main">
