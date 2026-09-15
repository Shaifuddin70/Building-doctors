<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'portfolio';
$meta = [
    'title' => 'Ottawa Permit Drawing Portfolio',
    'description' => 'Selected Building Doctors projects across Ottawa, Nepean, Kanata, Barrhaven, Gloucester, and Stittsville — additions, permits, site plans, and structural reports.',
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
        <p class="site-hero-lead">Additions, permit sets, site plans, and structural packages across Nepean, Kanata, Barrhaven, Gloucester, Stittsville, and greater Ottawa.</p>
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
          <article
            class="portfolio-card h-100 reveal"
            style="--card-image: url('<?= e($item['image']) ?>')"
          >
            <div class="portfolio-meta"><?= e($item['type']) ?> · <?= e($item['location']) ?></div>
            <h3><?= e($item['title']) ?></h3>
            <p><?= e($item['summary']) ?></p>
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
