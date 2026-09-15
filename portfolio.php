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

<section class="page-hero page-hero-photo" style="--page-hero-image: url('/assets/img/portfolio-1.jpg')">
  <div class="container">
    <span class="eyebrow">Portfolio</span>
    <h1>Every elevation. Every detail.</h1>
    <p>From front elevations to foundation plans — drawings that give contractors what they need to build, and inspectors what they need to approve.</p>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="filters reveal" role="tablist" aria-label="Filter portfolio">
      <button class="filter-btn is-active" type="button" data-filter="all">All</button>
      <?php foreach ($types as $type): ?>
        <button class="filter-btn" type="button" data-filter="<?= e($type) ?>"><?= e($type) ?></button>
      <?php endforeach; ?>
    </div>

    <div class="grid-3">
      <?php foreach ($portfolio as $i => $item): ?>
        <article
          class="portfolio-card reveal reveal-delay-<?= ($i % 3) + 1 ?>"
          data-type="<?= e($item['type']) ?>"
          style="--card-image: url('<?= e($item['image']) ?>')"
        >
          <div class="portfolio-meta"><?= e($item['type']) ?> · <?= e($item['location']) ?></div>
          <h3><?= e($item['title']) ?></h3>
          <p><?= e($item['summary']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-band reveal">
      <div>
        <h2>Have a project like these?</h2>
        <p>Send your address and a short description — we’ll confirm the permit path and next steps.</p>
      </div>
      <a class="btn btn-primary" href="/contact">Start Your Project</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
