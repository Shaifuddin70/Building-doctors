<?php
declare(strict_types=1);

/*
 * Front controller fallback: servers that rewrite unknown URLs to index.php
 * (e.g. ServBay/Nginx `try_files ... /index.php`) ignore .htaccess, so dispatch
 * clean URLs like /services to their page here.
 */
$requestPath = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
$requestPage = preg_replace('/\.php$/', '', $requestPath);

if ($requestPage !== '' && $requestPage !== 'index') {
    $pages = ['services', 'portfolio', 'about', 'contact'];
    if (in_array($requestPage, $pages, true)) {
        require __DIR__ . '/' . $requestPage . '.php';
        return;
    }

    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    echo "404 Not Found\n";
    return;
}

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'home';
$meta = [
    'title' => 'Building Permit Drawings & Drafting in Ottawa',
    'description' => 'Building Doctors provides architectural drafting, permit drawings, basement suite plans, and P.Eng structural reports for homeowners and contractors across Greater Ottawa.',
    'path' => '/',
];

require __DIR__ . '/includes/header.php';
?>

<section class="site-hero" style="--hero-image: url('/assets/img/hero-home.jpg')">
  <div class="container h-100">
    <div class="row align-items-end site-hero-row">
      <div class="col-12 col-lg-10 col-xl-9">
        <p class="site-hero-eyebrow">Building Doctors · Ottawa</p>
        <h1>We draw the plans that get your project approved.</h1>
        <p class="site-hero-lead">Architectural drafting, permit drawings, and structural reports for homeowners, contractors, and developers across Greater Ottawa.</p>
        <div class="d-flex flex-wrap gap-3">
          <a class="btn btn-primary" href="/contact">Get a Quote</a>
          <a class="btn btn-secondary" href="/services">View Services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="proof-band">
  <div class="container">
    <div class="proof-card">
      <p class="proof-intro">Trusted across Greater Ottawa for permit-ready drawings</p>
      <ul class="proof-stats">
        <?php foreach ($config['stats'] as $stat): ?>
          <li class="proof-stat">
            <span class="proof-icon"><?= icon($stat['icon'] ?? '') ?></span>
            <div>
              <strong><?= e($stat['value']) ?></strong>
              <span class="proof-label"><?= e($stat['label']) ?></span>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="row mb-4 mb-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">Our Services</span>
        <h2 class="section-title">Design, drafting, and engineering — built for Ottawa approvals.</h2>
        <p class="section-lead">From basement suites to additions and Committee of Adjustment applications, we deliver submission-ready packages that keep construction moving.</p>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach ($services as $i => $service): ?>
        <div class="col-12 col-md-6 col-lg-4">
          <article class="service-card h-100 reveal">
            <div class="service-index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
            <h3><?= e($service['title']) ?></h3>
            <p><?= e($service['short']) ?></p>
            <a class="link-arrow" href="/services#<?= e($service['id']) ?>">Learn more</a>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-navy">
  <div class="container">
    <div class="row mb-4 mb-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">How It Works</span>
        <h2 class="section-title text-white">A clear path from first call to permit approval.</h2>
        <p class="section-lead text-white-50">Ottawa planning and permitting can be confusing. We keep the process organized so you always know the next step.</p>
      </div>
    </div>
    <div class="row g-3">
      <?php
      $steps = [
          ['01', 'Scope & Review', 'Share your address and project goals. We confirm the likely permit path and drawing requirements.'],
          ['02', 'Site Measure', 'We measure existing conditions and gather the information needed for accurate drawings.'],
          ['03', 'Drawings & Coordination', 'We prepare permit drawings and coordinate structural or other consultants when required.'],
          ['04', 'Submit & Respond', 'We support municipal submission and help respond to city comments through approval.'],
      ];
      foreach ($steps as $step):
      ?>
        <div class="col-12 col-md-6 col-lg-3">
          <article class="process-step h-100 reveal">
            <div class="num"><?= e($step[0]) ?></div>
            <h3><?= e($step[1]) ?></h3>
            <p><?= e($step[2]) ?></p>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-concrete">
  <div class="container">
    <div class="row mb-4 mb-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">Selected Work</span>
        <h2 class="section-title">Projects that got built.</h2>
        <p class="section-lead">Permit drawings, additions, structural packages, and site plans delivered across the Greater Ottawa Area.</p>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach (array_slice($portfolio, 0, 3) as $item): ?>
        <div class="col-12 col-md-6 col-lg-4">
          <?php require __DIR__ . '/includes/portfolio-card.php'; ?>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-4">
      <a class="btn btn-outline" href="/portfolio">View Full Portfolio</a>
    </div>
  </div>
</section>

<?php foreach (array_slice($portfolio, 0, 3) as $item) {
    require __DIR__ . '/includes/portfolio-modal.php';
} ?>

<section class="section section-white">
  <div class="container">
    <div class="row mb-4 mb-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">Client Proof</span>
        <h2 class="section-title">Approved on the first submission.</h2>
        <p class="section-lead">Homeowners, landlords, and contractors trust Building Doctors for drawings that clear municipal review.</p>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach (array_slice($testimonials, 0, 3) as $item): ?>
        <div class="col-12 col-md-6 col-lg-4">
          <article class="testimonial-card h-100 reveal">
            <blockquote>“<?= e($item['quote']) ?>”</blockquote>
            <div class="testimonial-person">
              <div class="avatar"><?= e($item['initials']) ?></div>
              <div>
                <strong><?= e($item['name']) ?></strong>
                <span><?= e($item['role']) ?></span>
              </div>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-navy">
  <div class="container">
    <div class="row mb-4">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">Service Area</span>
        <h2 class="section-title text-white">Serving Ottawa and surrounding communities.</h2>
        <p class="section-lead text-white-50">Locally based in Nepean with deep familiarity with City of Ottawa permit and planning processes.</p>
      </div>
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
    <div class="cta-band reveal row align-items-center g-4">
      <div class="col-12 col-lg-7">
        <h2>Tell us what you’re building.</h2>
        <p>Most packages are ready in 10–14 business days. We respond within one business day.</p>
      </div>
      <div class="col-12 col-lg-5 d-flex flex-wrap gap-3 justify-content-lg-end">
        <a class="btn btn-primary" href="/contact">Request a Quote</a>
        <a class="btn btn-secondary" href="tel:<?= e($config['phone_tel']) ?>">Call <?= e($config['phone']) ?></a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
