<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'resources';
$meta = [
    'title' => 'Building Permit Drawings in Ontario — What You Need | Building Doctors',
    'description' => 'A practical checklist of drawings and documents Ontario municipalities typically require for building permits — written for Greater Ottawa homeowners, contractors, and builders.',
    'path' => '/resources',
];

$drawingTypes = [
    [
        'title' => 'Site Plan / Property Plan',
        'points' => [
            'Property lines, lot dimensions, civic address, and street name',
            'Existing buildings and proposed work with setbacks to lot lines',
            'Driveways, access, parking, and known utilities or private services where relevant',
            'Grading or drainage notes when the municipality asks for how water will leave the site after construction',
        ],
    ],
    [
        'title' => 'Floor Plans (all affected levels)',
        'points' => [
            'Dimensioned existing and proposed layouts for every floor touched by the work',
            'Walls, doors, windows, stairs, plumbing fixtures, and room uses clearly labelled',
            'Structural notes, assemblies, and finished floor elevations where required',
            'For secondary suites or ADUs: a clear layout of the separate living unit',
        ],
    ],
    [
        'title' => 'Foundation / Basement / Structural Plans',
        'points' => [
            'Footings, foundation walls, slabs, columns, piers, and beams for new structure or additions',
            'Framing plans, joist or truss layouts when engineered components are part of the design',
            'Details that show how loads transfer and how the building meets structural code expectations',
        ],
    ],
    [
        'title' => 'Elevations (exterior views)',
        'points' => [
            'Each exterior face showing existing and proposed conditions',
            'Roof lines, windows, doors, cladding, overhangs, decks, stairs, and railings',
            'Building height relative to grade for zoning and height-limit checks',
        ],
    ],
    [
        'title' => 'Sections & Cross-Sections',
        'points' => [
            'Vertical cuts through the building showing floor-to-ceiling heights and assemblies',
            'Foundation-to-roof relationships, stairs, landings, and deck connections',
            'Existing versus proposed structure on renovations and additions',
        ],
    ],
    [
        'title' => 'Roof Plan',
        'points' => [
            'Slopes, ridges, valleys, materials, ventilation, and drains or eavestroughs when the roof changes',
            'Framing or truss layout notes for new or altered roofs and accessory structures',
        ],
    ],
    [
        'title' => 'Mechanical, Electrical & Plumbing (when required)',
        'points' => [
            'HVAC, ductwork, and ventilation concepts for larger renovations or new builds',
            'Plumbing fixture locations and electrical notes where the municipality expects them',
            'Fire protection information when sprinklers or alarms are part of the scope',
        ],
    ],
    [
        'title' => 'Supporting documents & compliance',
        'points' => [
            'Signed and dated drawings by a qualified designer, BCIN professional, architect, or P.Eng as required',
            'Building permit application, proof of ownership or title, and survey or registered plan when asked',
            'Engineered grading or stormwater information on lots with drainage complexity',
        ],
    ],
];

$whyComplete = [
    ['Code & zoning compliance', 'Reviewers approve packages that show setbacks, coverage, height, fire separation, structure, and other code items clearly.'],
    ['Fewer delays', 'Missing sheets or vague details usually mean comments, resubmissions, and lost construction time.'],
    ['Safer builds', 'Detailed plans help keep framing, egress, fire separation, and ventilation on the right side of the code.'],
    ['Clearer contractor communication', 'A complete set reduces guesswork, change orders, and site confusion.'],
];

$summary = [
    'Site plan with lot lines, setbacks, existing and proposed buildings, access, and services',
    'Lot grading and drainage plan when required',
    'Full floor plans for every affected level (existing and proposed)',
    'Foundation and structural plans when applicable',
    'Elevations of all exterior sides with height and finishes',
    'Roof plan when the roof is new or altered',
    'Cross-sections showing assemblies, stairs, and structure',
    'Mechanical, plumbing, or electrical plans when required',
    'Signed or stamped drawings by the right design professional',
    'Permit forms, title documents, survey, and other municipal attachments',
];

require __DIR__ . '/includes/header.php';
?>

<section class="site-hero" style="--hero-image: url('/assets/img/services-banner.jpg')">
  <div class="container">
    <div class="row align-items-end site-hero-row">
      <div class="col-12 col-lg-10 col-xl-9">
        <p class="site-hero-eyebrow">Resources</p>
        <h1>Building permit drawings in Ontario — what you need to have</h1>
        <p class="site-hero-lead">A practical checklist of the drawings and details Greater Ottawa municipalities typically expect before issuing a building permit.</p>
        <div class="d-flex flex-wrap gap-3">
          <a class="btn btn-primary" href="/contact">Get a Quote</a>
          <a class="btn btn-secondary" href="/services">View Services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="row g-4 g-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">Permit Guide</span>
        <h2 class="section-title">Incomplete drawing sets slow projects down.</h2>
        <p class="section-lead">If you need building permit drawings in Ontario for a renovation, addition, secondary suite, ADU, or new build — whether you are a homeowner, contractor, or investor — municipalities expect a specific set of drawings with very specific details.</p>
        <p class="about-copy">Submitting an incomplete package can trigger comment cycles, delays, or refusal. Exact requirements vary by municipality and project type, but the checklist below covers the standard sheets most Ontario reviewers look for. Building Doctors prepares submission-ready packages for Greater Ottawa with that review process in mind.</p>
      </div>
      <div class="col-12 col-lg-4">
        <aside class="info-card h-100">
          <h3>Need a full package?</h3>
          <p>We prepare permit drawings, site plans, secondary suite packages, and P.Eng structural reports for Ottawa and surrounding communities.</p>
          <a class="btn btn-primary btn-sm mt-3" href="/contact">Request a quote</a>
        </aside>
      </div>
    </div>
  </div>
</section>

<section class="section section-concrete">
  <div class="container">
    <div class="row mb-4 mb-lg-5">
      <div class="col-12 col-lg-8">
        <span class="eyebrow">Drawing Types</span>
        <h2 class="section-title">Standard drawings for building permit applications</h2>
        <p class="section-lead">Whether the work is residential, multi-residential, commercial, or a secondary suite, these sheets show up again and again in municipal checklists.</p>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach ($drawingTypes as $i => $type): ?>
        <div class="col-12 col-lg-6">
          <article class="resource-card h-100 reveal">
            <span class="cred-index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
            <h3><?= e($type['title']) ?></h3>
            <ul class="check-list">
              <?php foreach ($type['points'] as $point): ?>
                <li><?= e($point) ?></li>
              <?php endforeach; ?>
            </ul>
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
        <span class="eyebrow">Why Completeness Matters</span>
        <h2 class="section-title">Professional drawings protect your schedule.</h2>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach ($whyComplete as $item): ?>
        <div class="col-12 col-md-6">
          <article class="info-card h-100 reveal">
            <h3><?= e($item[0]) ?></h3>
            <p><?= e($item[1]) ?></p>
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
        <span class="eyebrow">Quick Checklist</span>
        <h2 class="section-title text-white">Permit-ready drawing checklist</h2>
        <p class="section-lead">Before you apply, confirm your package includes at least the items your municipality asks for from this list.</p>
      </div>
    </div>
    <ul class="permit-list row">
      <?php foreach ($summary as $item): ?>
        <li class="col-12 col-md-6"><?= e($item) ?></li>
      <?php endforeach; ?>
    </ul>
    <div class="mt-4 mt-lg-5">
      <a class="btn btn-primary" href="/contact">Ask about your project</a>
      <a class="btn btn-secondary ms-0 ms-sm-2 mt-2 mt-sm-0" href="/services#permit-drawings">Permit drawing services</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-band reveal row align-items-center g-4">
      <div class="col-12 col-lg-8">
        <h2>Ready for a submission-ready package?</h2>
        <p>Tell us the address and scope — we will confirm the likely permit path and the drawings your municipality will expect.</p>
      </div>
      <div class="col-12 col-lg-4 d-flex justify-content-lg-end">
        <a class="btn btn-primary" href="/contact">Get a Quote</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
