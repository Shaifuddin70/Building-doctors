<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'home';
$meta = [
    'title' => 'Building Permit Drawings & Drafting in Ottawa',
    'description' => 'Building Doctors provides architectural drafting, permit drawings, basement suite plans, and P.Eng structural reports for homeowners and contractors across Greater Ottawa.',
    'path' => '/',
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero" style="--hero-image: url('/assets/img/hero-home.jpg')">
  <div class="container hero-inner">
    <div class="hero-brand">
      <img src="/assets/img/logo.svg" width="56" height="56" alt="">
      <span class="hero-brand-name">Building Doctors</span>
    </div>
    <h1>We draw the plans that get your project approved.</h1>
    <p class="hero-lead">Architectural drafting, permit drawings, and structural reports for homeowners, contractors, and developers across the Greater Ottawa Area.</p>
    <div class="btn-group">
      <a class="btn btn-primary" href="/contact.php">Get a Quote</a>
      <a class="btn btn-secondary" href="/services.php">View Services</a>
    </div>
  </div>
</section>

<section class="section-tight">
  <div class="container">
    <div class="trust-strip reveal">
      <?php foreach ($config['stats'] as $stat): ?>
        <div class="trust-item">
          <strong><?= e($stat['value']) ?></strong>
          <span><?= e($stat['label']) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Our Services</span>
      <h2>Design, drafting, and engineering — built for Ottawa approvals.</h2>
      <p>From basement suites to additions and Committee of Adjustment applications, we deliver submission-ready packages that keep construction moving.</p>
    </div>

    <div class="grid-3">
      <?php foreach ($services as $i => $service): ?>
        <article class="service-card reveal reveal-delay-<?= ($i % 3) + 1 ?>">
          <div class="service-index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
          <h3><?= e($service['title']) ?></h3>
          <p><?= e($service['short']) ?></p>
          <a class="link-arrow" href="/services.php#<?= e($service['id']) ?>">Learn more</a>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-navy">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">How It Works</span>
      <h2>A clear path from first call to permit approval.</h2>
      <p>Ottawa planning and permitting can be confusing. We keep the process organized so you always know the next step.</p>
    </div>
    <div class="process-grid">
      <?php
      $steps = [
          ['01', 'Scope & Review', 'Share your address and project goals. We confirm the likely permit path and drawing requirements.'],
          ['02', 'Site Measure', 'We measure existing conditions and gather the information needed for accurate drawings.'],
          ['03', 'Drawings & Coordination', 'We prepare permit drawings and coordinate structural or other consultants when required.'],
          ['04', 'Submit & Respond', 'We support municipal submission and help respond to city comments through approval.'],
      ];
      foreach ($steps as $i => $step):
      ?>
        <article class="process-step reveal reveal-delay-<?= ($i % 4) + 1 ?>">
          <div class="num"><?= e($step[0]) ?></div>
          <h3><?= e($step[1]) ?></h3>
          <p><?= e($step[2]) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-concrete">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Selected Work</span>
      <h2>Projects that got built.</h2>
      <p>Permit drawings, additions, structural packages, and site plans delivered across the Greater Ottawa Area.</p>
    </div>
    <div class="grid-3">
      <?php foreach (array_slice($portfolio, 0, 3) as $i => $item): ?>
        <article class="portfolio-card reveal reveal-delay-<?= ($i % 3) + 1 ?>" style="--card-image: url('<?= e($item['image']) ?>')">
          <div class="portfolio-meta"><?= e($item['type']) ?> · <?= e($item['location']) ?></div>
          <h3><?= e($item['title']) ?></h3>
          <p><?= e($item['summary']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
    <div class="btn-group" style="margin-top: 2rem;">
      <a class="btn btn-outline" href="/portfolio.php">View Full Portfolio</a>
    </div>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Client Proof</span>
      <h2>Approved on the first submission.</h2>
      <p>Homeowners, landlords, and contractors trust Building Doctors for drawings that clear municipal review.</p>
    </div>
    <div class="grid-3">
      <?php foreach (array_slice($testimonials, 0, 3) as $i => $item): ?>
        <article class="testimonial-card reveal reveal-delay-<?= ($i % 3) + 1 ?>">
          <blockquote>“<?= e($item['quote']) ?>”</blockquote>
          <div class="testimonial-person">
            <div class="avatar"><?= e($item['initials']) ?></div>
            <div>
              <strong><?= e($item['name']) ?></strong>
              <span><?= e($item['role']) ?></span>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-navy">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Service Area</span>
      <h2>Serving Ottawa and surrounding communities.</h2>
      <p>Locally based in Nepean with deep familiarity with City of Ottawa permit and planning processes.</p>
    </div>
    <div class="area-cloud reveal">
      <?php foreach ($config['service_areas'] as $area): ?>
        <span class="area-pill"><?= e($area) ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-band reveal">
      <div>
        <h2>Tell us what you’re building.</h2>
        <p>Most packages are ready in 10–14 business days. We respond within one business day.</p>
      </div>
      <div class="btn-group">
        <a class="btn btn-primary" href="/contact.php">Request a Quote</a>
        <a class="btn btn-secondary" href="tel:<?= e($config['phone_tel']) ?>">Call <?= e($config['phone']) ?></a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
