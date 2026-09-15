<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'services';
$meta = [
    'title' => 'Building Permit & Drafting Services in Ottawa',
    'description' => 'Permit drawings, home additions, basement secondary suites, site plans, Committee of Adjustment support, and P.Eng structural reports for Greater Ottawa.',
    'path' => '/services',
];

$permitTriggers = [
    'Add a second suite or legal basement apartment',
    'Construct an addition to an existing building',
    'Make structural alterations or remove load-bearing walls',
    'Create new openings or change door and window sizes',
    'Build a garage, balcony, or deck over height thresholds',
    'Excavate a basement or construct a foundation',
    'Install or modify heating, plumbing, or HVAC systems',
    'Construct a basement entrance or walkout',
    'Change a building’s use',
    'Construct an accessory structure over municipal size limits',
];

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero page-hero-photo" style="--page-hero-image: url('/assets/img/services-banner.jpg')">
  <div class="container">
    <span class="eyebrow">Services</span>
    <h1>Permit-ready design and drafting for Ottawa projects.</h1>
    <p>Building Doctors prepares architectural drawings, engineering documentation, and municipal submission support for homeowners, builders, contractors, and business owners.</p>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <?php foreach ($services as $i => $service): ?>
      <article class="service-block reveal" id="<?= e($service['id']) ?>">
        <div>
          <div class="service-index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
          <h2><?= e($service['title']) ?></h2>
          <p><?= e($service['description']) ?></p>
        </div>
        <div>
          <h3 class="eyebrow" style="margin-bottom: 1rem;">What’s included</h3>
          <ul class="check-list">
            <?php foreach ($service['includes'] as $item): ?>
              <li><?= e($item) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="section section-concrete">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Who We Serve</span>
      <h2>Built for the people who get projects done.</h2>
      <p>Whether you’re renovating a family home or coordinating multiple contractor jobs, we keep drawings clear, code-aware, and submission-ready.</p>
    </div>
    <div class="grid-2">
      <?php
      $audiences = [
          ['Homeowners', 'Clear guidance through Ottawa permit requirements for renovations, suites, and additions.'],
          ['Builders & Contractors', 'Fast turnaround drawing packages that keep crews productive and inspectors informed.'],
          ['Business Owners', 'Commercial renovation and change-of-use drawing support for tenant improvements.'],
          ['Developers & Investors', 'Secondary suites, site plans, and CoA packages that protect timelines and rental upside.'],
      ];
      foreach ($audiences as $i => $aud):
      ?>
        <article class="info-card reveal reveal-delay-<?= ($i % 2) + 1 ?>">
          <h3><?= e($aud[0]) ?></h3>
          <p><?= e($aud[1]) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">When Is a Building Permit Required?</span>
      <h2>Know before you dig, open a wall, or add a suite.</h2>
      <p>Exact requirements vary by municipality and scope. These are common triggers across Ottawa and surrounding communities:</p>
    </div>
    <ul class="permit-list reveal">
      <?php foreach ($permitTriggers as $item): ?>
        <li><?= e($item) ?></li>
      <?php endforeach; ?>
    </ul>
    <div class="btn-group" style="margin-top: 2rem;">
      <a class="btn btn-primary" href="/contact">Ask About Your Project</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
