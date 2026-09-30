<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'portfolio';
$meta = [
    'title' => 'Ottawa Permit Drawing Portfolio',
    'description' => 'Selected Building Doctors work — basement walkouts, architectural drawing sets, site plans, and structural steel drawings for projects across Greater Ottawa.',
    'path' => '/portfolio',
];

$types = array_values(array_unique(array_map(static fn(array $p): string => $p['type'], $portfolio)));

require __DIR__ . '/includes/header.php';
?>

<section class="site-hero" style="--hero-image: url('/assets/img/portfolio-1.jpg')">
  <div class="container">
    <div class="row align-items-end site-hero-row">
      <div class="col-12 col-lg-10 col-xl-9">
        <p class="site-hero-eyebrow">Portfolio</p>
        <h1>Projects that cleared review and got built.</h1>
        <p class="site-hero-lead">Basement walkouts, architectural drawing sets, site plans, and structural steel packages. Open any project to view the drawings.</p>
        <div class="d-flex flex-wrap gap-3">
          <a class="btn btn-primary" href="/contact">Start a similar project</a>
          <a class="btn btn-secondary" href="/services">Our services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="filters reveal mb-4" role="tablist" aria-label="Filter portfolio">
      <button class="filter-btn is-active" type="button" data-filter="all">All</button>
      <?php foreach ($types as $type): ?>
        <button class="filter-btn" type="button" data-filter="<?= e($type) ?>"><?= e($type) ?></button>
      <?php endforeach; ?>
    </div>

    <div class="row g-4">
      <?php foreach ($portfolio as $item): ?>
        <div class="col-12 col-md-6 col-lg-4" data-type="<?= e($item['type']) ?>">
          <?php require __DIR__ . '/includes/portfolio-card.php'; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php foreach ($portfolio as $item) {
    require __DIR__ . '/includes/portfolio-modal.php';
} ?>

<section class="section">
  <div class="container">
    <div class="cta-band reveal row align-items-center g-4">
      <div class="col-12 col-lg-8">
        <h2>Have a project like these?</h2>
        <p>Send your address and a short description — we’ll confirm the permit path and next steps.</p>
      </div>
      <div class="col-12 col-lg-4 d-flex justify-content-lg-end">
        <a class="btn btn-primary" href="/contact">Start Your Project</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
