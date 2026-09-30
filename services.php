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

$serviceIcons = [
    'permit-drawings' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5M9 13h6M9 17h4"/>',
    'home-additions' => '<path d="M3 11l9-7 9 7"/><path d="M5 10v10h14V10"/><path d="M12 11v6M9 14h6"/>',
    'basement-permits' => '<path d="M3 11l9-7 9 7"/><path d="M5 10v10h14V10"/><path d="M8 20v-3h3v-3h3v-3h2"/>',
    'site-plans' => '<path d="M9 4 3 6v14l6-2 6 2 6-2V4l-6 2z"/><path d="M9 4v14M15 6v14"/>',
    'committee-of-adjustment' => '<path d="M12 3v18M7 21h10M5 7h14"/><path d="M5 7l-3 6a3 3 0 0 0 6 0zM19 7l-3 6a3 3 0 0 0 6 0z"/>',
    'structural-reports' => '<path d="M5 4h14M5 20h14M12 4v16"/><path d="M8 4v2M16 4v2M8 18v2M16 18v2"/>',
];

require __DIR__ . '/includes/header.php';
?>

<section class="site-hero" style="--hero-image: url('/assets/img/services-banner.jpg')">
  <div class="container">
    <div class="row align-items-end site-hero-row">
      <div class="col-12 col-lg-10 col-xl-9">
        <p class="site-hero-eyebrow">Services</p>
        <h1>Permit-ready design and drafting for Ottawa projects.</h1>
        <p class="site-hero-lead">Architectural drawings, engineering documentation, and municipal submission support for homeowners, builders, contractors, and business owners.</p>
        <div class="d-flex flex-wrap gap-3">
          <a class="btn btn-primary" href="/contact">Request a quote</a>
          <a class="btn btn-secondary" href="#permit-drawings">Browse services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-concrete service-jump-section">
  <div class="container">
    <div class="service-jump-head">
      <h2 class="section-title">What we do</h2>
      <p>Six services, one team. Jump to the one your project needs.</p>
    </div>
    <div class="row g-3 service-jump">
      <?php foreach ($services as $i => $service): ?>
        <div class="col-12 col-md-6 col-lg-4">
          <a class="service-jump-link" href="#<?= e($service['id']) ?>">
            <span class="service-jump-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><?= $serviceIcons[$service['id']] ?? $serviceIcons['permit-drawings'] ?></svg>
            </span>
            <span class="service-jump-text">
              <span class="service-jump-index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
              <span class="service-jump-title"><?= e($service['title']) ?></span>
              <span class="service-jump-tagline"><?= e($service['tagline'] ?? '') ?></span>
            </span>
            <span class="service-jump-arrow" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M12 5v14M6 13l6 6 6-6"/></svg>
            </span>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php foreach ($services as $i => $service):
    $index = str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);
    $layout = $service['layout'] ?? 'split-right';
    $tone = $service['tone'] ?? 'white';
    $sectionClass = match ($tone) {
        'navy' => 'section-navy',
        'concrete' => 'section-concrete',
        default => 'section-white',
    };
?>
  <?php if ($layout === 'feature'): ?>
    <section class="service-feature section <?= e($sectionClass) ?>" id="<?= e($service['id']) ?>">
      <div class="container">
        <div class="service-feature-media" style="--service-image: url('<?= e($service['image']) ?>')">
          <div class="service-feature-overlay">
            <div class="row">
              <div class="col-12 col-lg-8 col-xl-7">
                <div class="service-index"><?= e($index) ?></div>
                <p class="service-tagline"><?= e($service['tagline'] ?? '') ?></p>
                <h2><?= e($service['title']) ?></h2>
                <p class="service-desc"><?= e($service['description']) ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-3 mt-4">
          <?php foreach ($service['includes'] as $item): ?>
            <div class="col-12 col-md-6 col-lg-3">
              <div class="service-include-tile">
                <span></span>
                <p><?= e($item) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <?php if (!empty($service['compare'])):
            $compare = $service['compare'];
        ?>
          <div class="row g-4 g-lg-5 align-items-center mt-2 service-compare reveal">
            <div class="col-12 col-lg-7">
              <?php require __DIR__ . '/includes/compare-slider.php'; ?>
            </div>
            <div class="col-12 col-lg-5">
              <p class="service-tagline">Recent project</p>
              <h3><?= e($compare['title']) ?></h3>
              <p class="service-desc"><?= e($compare['caption']) ?></p>
              <a class="link-arrow" href="/portfolio">See more of our work</a>
            </div>
          </div>
        <?php endif; ?>
        <div class="mt-4">
          <a class="btn btn-primary" href="/contact?service=<?= urlencode($service['title']) ?>">Request this service</a>
        </div>
      </div>
    </section>

  <?php elseif ($layout === 'cards'): ?>
    <section class="service-cards-block section <?= e($sectionClass) ?>" id="<?= e($service['id']) ?>">
      <div class="container">
        <div class="row g-4 g-lg-5 align-items-end mb-4 mb-lg-5">
          <div class="col-12 col-lg-7">
            <div class="service-index"><?= e($index) ?></div>
            <p class="service-tagline"><?= e($service['tagline'] ?? '') ?></p>
            <h2 class="section-title<?= $tone === 'navy' ? ' text-white' : '' ?>"><?= e($service['title']) ?></h2>
            <p class="service-desc<?= $tone === 'navy' ? ' text-white-50' : '' ?>"><?= e($service['description']) ?></p>
          <a class="btn btn-primary mt-2" href="/contact?service=<?= urlencode($service['title']) ?>">Request this service</a>
          </div>
          <div class="col-12 col-lg-5">
            <figure class="service-side-photo mb-0">
              <img class="img-fluid w-100" src="<?= e($service['image']) ?>" alt="<?= e($service['title']) ?>" width="800" height="560" loading="lazy">
            </figure>
          </div>
        </div>
        <div class="row g-3">
          <?php foreach ($service['includes'] as $j => $item): ?>
            <div class="col-12 col-md-6 col-lg-3">
              <article class="service-include-card">
                <span class="cred-index"><?= str_pad((string) ($j + 1), 2, '0', STR_PAD_LEFT) ?></span>
                <p><?= e($item) ?></p>
              </article>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  <?php else:
      $imageFirst = $layout === 'split-left';
  ?>
    <section class="service-split section <?= e($sectionClass) ?>" id="<?= e($service['id']) ?>">
      <div class="container">
        <div class="row g-4 g-lg-5 align-items-center<?= $imageFirst ? '' : ' flex-lg-row-reverse' ?>">
          <div class="col-12 col-lg-6">
            <figure class="service-split-photo mb-0">
              <img class="img-fluid w-100" src="<?= e($service['image']) ?>" alt="<?= e($service['title']) ?>" width="900" height="700" loading="lazy">
              <figcaption class="service-photo-caption"><?= e($service['tagline'] ?? $service['title']) ?></figcaption>
            </figure>
          </div>
          <div class="col-12 col-lg-6">
            <div class="service-index"><?= e($index) ?></div>
            <p class="service-tagline"><?= e($service['tagline'] ?? '') ?></p>
            <h2 class="<?= $tone === 'navy' ? 'text-white' : '' ?>"><?= e($service['title']) ?></h2>
            <p class="service-desc"><?= e($service['description']) ?></p>
            <h3 class="eyebrow mb-3">What’s included</h3>
            <ul class="check-list<?= $tone === 'navy' ? ' check-list-light' : '' ?>">
              <?php foreach ($service['includes'] as $item): ?>
                <li><?= e($item) ?></li>
              <?php endforeach; ?>
            </ul>
            <a class="btn btn-primary mt-4" href="/contact?service=<?= urlencode($service['title']) ?>">Request this service</a>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endforeach; ?>

<section class="section section-concrete">
  <div class="container">
    <div class="row mb-4 mb-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">Who We Serve</span>
        <h2 class="section-title">Built for the people who get projects done.</h2>
        <p class="section-lead">Whether you’re renovating a family home or coordinating multiple contractor jobs, we keep drawings clear, code-aware, and submission-ready.</p>
      </div>
    </div>
    <div class="row g-4">
      <?php
      $audiences = [
          ['Homeowners', 'Clear guidance through Ottawa permit requirements for renovations, suites, and additions.'],
          ['Builders & Contractors', 'Fast turnaround drawing packages that keep crews productive and inspectors informed.'],
          ['Business Owners', 'Commercial renovation and change-of-use drawing support for tenant improvements.'],
          ['Developers & Investors', 'Secondary suites, site plans, and CoA packages that protect timelines and rental upside.'],
      ];
      foreach ($audiences as $aud):
      ?>
        <div class="col-12 col-md-6">
          <article class="info-card h-100">
            <h3><?= e($aud[0]) ?></h3>
            <p><?= e($aud[1]) ?></p>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="row mb-4 mb-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">When Is a Building Permit Required?</span>
        <h2 class="section-title">Know before you dig, open a wall, or add a suite.</h2>
        <p class="section-lead">Exact requirements vary by municipality and scope. These are common triggers across Ottawa and surrounding communities:</p>
      </div>
    </div>
    <ul class="permit-list row">
      <?php foreach ($permitTriggers as $item): ?>
        <li class="col-12 col-md-6"><?= e($item) ?></li>
      <?php endforeach; ?>
    </ul>
    <div class="mt-4">
      <a class="btn btn-primary" href="/contact">Ask About Your Project</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
