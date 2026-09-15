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

<section class="site-hero" style="--hero-image: url('/assets/img/about-office.jpg')">
  <div class="container">
    <div class="row align-items-end site-hero-row">
      <div class="col-12 col-lg-10 col-xl-9">
        <p class="site-hero-eyebrow">About Us</p>
        <h1>Engineered precision. Local Ottawa judgment.</h1>
        <p class="site-hero-lead">A Greater Ottawa drafting and design practice — P.Eng backed drawings meant to clear municipal review without endless revision loops.</p>
        <div class="d-flex flex-wrap gap-3">
          <a class="btn btn-primary" href="/contact">Work with us</a>
          <a class="btn btn-secondary" href="/portfolio">View portfolio</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-white about-story">
  <div class="container">
    <div class="row g-4 g-lg-5 align-items-center">
      <div class="col-12 col-lg-6 reveal">
        <span class="eyebrow">Our Story</span>
        <h2 class="section-title">Drawings that clear the counter — without revision loops.</h2>
        <p class="about-copy">Behind every set of drawings is a Professional Engineer licensed in Ontario, with hands-on experience in geotechnical assessment, site grading, and municipal planning. We’ve worked the City of Ottawa permit desk from both sides of the counter.</p>
        <p class="about-copy">That combination matters. It means we design for constructability and for what reviewers actually look for — reducing comment cycles and protecting your construction schedule.</p>
        <p class="about-copy mb-0">We serve homeowners renovating for space or rental income, contractors who need reliable packages, and business owners navigating commercial alterations.</p>
      </div>

      <div class="col-12 col-lg-6 reveal">
        <figure class="about-photo mb-0">
          <img class="img-fluid w-100" src="/assets/img/about-office.jpg" alt="Architectural plans and drafting tools on a desk" width="800" height="640" loading="lazy">
        </figure>
      </div>
    </div>

    <div class="row g-3 g-md-4 mt-4 mt-lg-5">
      <div class="col-12 col-md-4">
        <article class="cred-card h-100 reveal">
          <span class="cred-index">01</span>
          <div>
            <strong>P.Eng — Professional Engineers Ontario</strong>
            <p>Licensed to practise civil and geotechnical engineering in Ontario.</p>
          </div>
        </article>
      </div>
      <div class="col-12 col-md-4">
        <article class="cred-card h-100 reveal">
          <span class="cred-index">02</span>
          <div>
            <strong>City of Ottawa Experience</strong>
            <p>Municipal infrastructure and transportation background informing practical submissions.</p>
          </div>
        </article>
      </div>
      <div class="col-12 col-md-4">
        <article class="cred-card h-100 reveal">
          <span class="cred-index">03</span>
          <div>
            <strong>Greater Ottawa Focus</strong>
            <p>Nepean-based, serving Kanata, Barrhaven, Gloucester, Stittsville, and surrounding areas.</p>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="section section-concrete">
  <div class="container">
    <div class="row mb-4 mb-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">Why Building Doctors</span>
        <h2 class="section-title">Local knowledge. Engineering accountability.</h2>
      </div>
    </div>
    <div class="row g-4">
      <?php
      $why = [
          ['Permit-first mindset', 'We design for municipal approval pathways — not just pretty plans that stall at review.'],
          ['Clear communication', 'Weekly-ready updates, plain-language guidance, and drawings contractors can actually build from.'],
          ['End-to-end support', 'From site measure through city comments, we stay with the application until it moves forward.'],
      ];
      foreach ($why as $item):
      ?>
        <div class="col-12 col-md-6 col-lg-4">
          <article class="info-card h-100 reveal">
            <h3><?= e($item[0]) ?></h3>
            <p><?= e($item[1]) ?></p>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-band reveal row align-items-center g-4">
      <div class="col-12 col-lg-8">
        <h2>Ready to talk through your project?</h2>
        <p>Call <?= e($config['phone']) ?> or send a short brief — we reply within one business day.</p>
      </div>
      <div class="col-12 col-lg-4 d-flex justify-content-lg-end">
        <a class="btn btn-primary" href="/contact">Contact Us</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
