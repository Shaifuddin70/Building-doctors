<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'thank-you';
$meta = [
    'title' => 'Inquiry Received — Building Doctors',
    'description' => 'Thanks for contacting Building Doctors. We’ve received your quote request and will reply within one business day.',
    'path' => '/thank-you',
    'robots' => 'noindex, follow',
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section-white thank-you-section">
  <div class="container">
    <div class="thank-you-panel reveal">
      <span class="thank-you-badge" aria-hidden="true">✓</span>
      <p class="eyebrow">Inquiry received</p>
      <h1 class="section-title">Thank you. Your message is on its way.</h1>
      <p class="section-lead">We’ve received your quote request and will reply within one business day. If your project is time-sensitive, call us now.</p>
      <div class="thank-you-actions">
        <a class="btn btn-primary" href="tel:<?= e($config['phone_tel']) ?>">Call <?= e($config['phone']) ?></a>
        <a class="btn btn-outline" href="/">Back to home</a>
        <a class="btn btn-outline" href="/services">View services</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
