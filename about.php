<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'about';
$meta = [
    'title' => 'About Building Doctors — Ottawa Drafting & Engineering',
    'description' => 'Building Doctors is a Greater Ottawa drafting and design practice backed by P.Eng licensed engineers with municipal and geotechnical experience.',
    'path' => '/about',
];

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero page-hero-photo" style="--page-hero-image: url('/assets/img/about-office.jpg')">
  <div class="container">
    <span class="eyebrow">About Us</span>
    <h1>Engineered precision. Human scale.</h1>
    <p>Building Doctors is a Greater Ottawa Area drafting and design practice built on one principle: homeowners and contractors deserve drawings that actually get approved.</p>
  </div>
</section>

<section class="section section-white">
  <div class="container grid-2" style="align-items: start;">
    <div class="reveal">
      <span class="eyebrow">Our Story</span>
      <h2>Drawings that clear the counter — without revision loops.</h2>
      <p>Behind every set of drawings is a Professional Engineer licensed in Ontario, with hands-on experience in geotechnical assessment, site grading, and municipal planning. We’ve worked the City of Ottawa permit desk from both sides of the counter.</p>
      <p>That combination matters. It means we design for constructability and for what reviewers actually look for — reducing comment cycles and protecting your construction schedule.</p>
      <p>We serve homeowners renovating for space or rental income, contractors who need reliable packages, and business owners navigating commercial alterations.</p>
      <figure class="about-photo reveal">
        <img src="/assets/img/about-office.jpg" alt="Architectural plans and drafting tools on a desk" width="800" height="520" loading="lazy">
      </figure>
    </div>
    <div class="cred-grid reveal">
      <article class="cred-card">
        <strong>P.Eng — Professional Engineers Ontario</strong>
        <p>Licensed to practise civil and geotechnical engineering in Ontario.</p>
      </article>
      <article class="cred-card">
        <strong>City of Ottawa Experience</strong>
        <p>Municipal infrastructure and transportation background informing practical submissions.</p>
      </article>
      <article class="cred-card">
        <strong>Greater Ottawa Focus</strong>
        <p>Nepean-based, serving Kanata, Barrhaven, Gloucester, Stittsville, and surrounding areas.</p>
      </article>
    </div>
  </div>
</section>

<section class="section section-concrete">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Why Building Doctors</span>
      <h2>Local knowledge. Engineering accountability.</h2>
    </div>
    <div class="grid-3">
      <?php
      $why = [
          ['Permit-first mindset', 'We design for municipal approval pathways — not just pretty plans that stall at review.'],
          ['Clear communication', 'Weekly-ready updates, plain-language guidance, and drawings contractors can actually build from.'],
          ['End-to-end support', 'From site measure through city comments, we stay with the application until it moves forward.'],
      ];
      foreach ($why as $i => $item):
      ?>
        <article class="info-card reveal reveal-delay-<?= ($i % 3) + 1 ?>">
          <h3><?= e($item[0]) ?></h3>
          <p><?= e($item[1]) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-band reveal">
      <div>
        <h2>Ready to talk through your project?</h2>
        <p>Call <?= e($config['phone']) ?> or send a short brief — we reply within one business day.</p>
      </div>
      <a class="btn btn-primary" href="/contact">Contact Us</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
