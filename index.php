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
    $pages = ['services', 'portfolio', 'about', 'contact', 'resources', 'thank-you'];
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

$homeFeatured = array_slice($portfolio, 0, 3);
$homeSteps = [
    ['01', 'Scope & Review', 'Share your address and project goals. We confirm the likely permit path and drawing requirements.'],
    ['02', 'Site Measure', 'We measure existing conditions and gather the information needed for accurate drawings.'],
    ['03', 'Drawings & Coordination', 'We prepare permit drawings and coordinate structural or other consultants when required.'],
    ['04', 'Submit & Respond', 'We support municipal submission and help respond to city comments through approval.'],
];
?>

<section class="home-hero">
  <div class="home-hero-media" aria-hidden="true">
    <div class="home-hero-image" style="background-image: url('/assets/img/hero-bg.png')"></div>
    <div class="home-hero-veil"></div>
  </div>
  <div class="container home-hero-copy">
    <p class="home-hero-eyebrow">
      <span>Greater Ottawa Area’s Drafting &amp; Design Practice</span>
    </p>
    <h1 class="home-hero-title">
      <span class="home-line"><span>We draw the plans</span></span>
      <span class="home-line"><span>that get your project</span></span>
      <span class="home-line"><span>approved.</span></span>
    </h1>
    <p class="home-hero-lead">Architectural drafting, permit drawings, and structural reports for homeowners, contractors, and developers across Greater Ottawa.</p>
    <div class="home-hero-actions">
      <a class="btn btn-primary" href="/contact">Get a Quote <span aria-hidden="true">→</span></a>
      <a class="btn btn-secondary" href="/services">View Services</a>
    </div>
  </div>
</section>

<section class="home-proof" id="home-proof">
  <div class="container">
    <ul class="home-proof-grid">
      <?php foreach ($config['stats'] as $stat): ?>
        <li class="home-proof-item reveal">
          <span class="home-proof-icon"><?= icon($stat['icon'] ?? '') ?></span>
          <strong><?= e($stat['value']) ?></strong>
          <span><?= e($stat['label']) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section home-services" id="home-services">
  <div class="container">
    <div class="home-split-head reveal">
      <div>
        <span class="eyebrow">Our Services</span>
        <h2 class="section-title">Six disciplines. One approval-first studio.</h2>
      </div>
      <p class="section-lead mb-0">Every package is drawn for Ottawa review — not just for the board.</p>
    </div>
    <div class="home-services-stage">
      <div class="home-services-list">
        <?php foreach ($services as $i => $service): ?>
          <a class="home-service<?= $i === 0 ? ' is-active' : '' ?>" href="/services#<?= e($service['id']) ?>" data-home-service="<?= e($service['id']) ?>">
            <span class="home-service-index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
            <span class="home-service-copy">
              <strong><?= e($service['title']) ?></strong>
              <em><?= e($service['tagline'] ?? '') ?></em>
            </span>
            <span class="home-service-go" aria-hidden="true"><?= icon('arrow-right') ?></span>
          </a>
        <?php endforeach; ?>
      </div>
      <div class="home-services-preview" aria-hidden="true">
        <?php foreach ($services as $i => $service): ?>
          <figure class="home-service-shot<?= $i === 0 ? ' is-active' : '' ?>" data-home-shot="<?= e($service['id']) ?>">
            <img src="<?= e($service['image']) ?>" alt="" width="900" height="700">
            <figcaption><?= e($service['title']) ?></figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="section section-navy home-process-band">
  <div class="container">
    <div class="home-split-head reveal">
      <div>
        <span class="eyebrow">How It Works</span>
        <h2 class="section-title text-white">Four steps from first call to stamped drawings.</h2>
      </div>
      <p class="section-lead text-white-50 mb-0">Ottawa permitting can stall a build. We keep the path short, visible, and moving.</p>
    </div>
    <ol class="home-process" data-home-process>
      <?php foreach ($homeSteps as $i => $step): ?>
        <li class="home-process-step reveal" style="--delay: <?= $i * 0.08 ?>s">
          <span class="home-process-num"><?= e($step[0]) ?></span>
          <h3><?= e($step[1]) ?></h3>
          <p><?= e($step[2]) ?></p>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="section section-concrete home-work">
  <div class="container">
    <div class="home-split-head reveal">
      <div>
        <span class="eyebrow">Selected Work</span>
        <h2 class="section-title">Projects that got built.</h2>
      </div>
      <a class="link-arrow" href="/portfolio">View full portfolio</a>
    </div>
    <div class="home-work-grid">
      <?php foreach ($homeFeatured as $i => $item): ?>
        <div class="home-work-item home-work-item-<?= $i + 1 ?>">
          <?php require __DIR__ . '/includes/portfolio-card.php'; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php foreach ($homeFeatured as $item) {
    require __DIR__ . '/includes/portfolio-modal.php';
} ?>

<section class="section section-white home-quotes">
  <div class="container">
    <div class="home-quotes-layout">
      <div class="reveal">
        <span class="eyebrow">Client Proof</span>
        <h2 class="section-title">Approved on the first submission.</h2>
        <p class="section-lead">Homeowners, landlords, and contractors trust Building Doctors for drawings that clear municipal review.</p>
      </div>
      <div class="home-quote-stage" data-home-quotes>
        <?php foreach ($testimonials as $i => $item): ?>
          <figure class="home-quote<?= $i === 0 ? ' is-active' : '' ?>">
            <blockquote>“<?= e($item['quote']) ?>”</blockquote>
            <figcaption>
              <span class="avatar"><?= e($item['initials']) ?></span>
              <span>
                <strong><?= e($item['name']) ?></strong>
                <?= e($item['role']) ?>
              </span>
            </figcaption>
          </figure>
        <?php endforeach; ?>
        <div class="home-quote-dots" role="tablist" aria-label="Testimonials">
          <?php foreach ($testimonials as $i => $item): ?>
            <button type="button" class="<?= $i === 0 ? 'is-active' : '' ?>" aria-label="Show quote <?= $i + 1 ?>" data-home-quote="<?= $i ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="home-areas">
  <div class="container">
    <div class="home-areas-copy reveal">
      <span class="eyebrow">Service Area</span>
      <h2 class="section-title">Greater Ottawa, covered.</h2>
    </div>
  </div>
  <div class="home-areas-marquee" aria-hidden="true">
    <div class="home-areas-track">
      <?php for ($pass = 0; $pass < 2; $pass++): ?>
        <?php foreach ($config['service_areas'] as $area): ?>
          <span><?= e($area) ?></span>
        <?php endforeach; ?>
      <?php endfor; ?>
    </div>
  </div>
</section>

<section class="home-cta">
  <div class="container">
    <div class="home-cta-panel reveal">
      <p class="home-hero-eyebrow"><span>Start a project</span></p>
      <h2>Tell us what you’re building.</h2>
      <p>Most packages are ready in 10–14 business days. We reply within one business day.</p>
      <div class="home-hero-actions">
        <a class="btn btn-primary" href="/contact">Request a Quote</a>
        <a class="btn btn-secondary" href="tel:<?= e($config['phone_tel']) ?>">Call <?= e($config['phone']) ?></a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
