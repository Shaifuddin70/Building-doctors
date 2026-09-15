<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';

$currentPage = 'contact';
$meta = [
    'title' => 'Contact Building Doctors — Ottawa Permit Quotes',
    'description' => 'Request a quote for permit drawings, basement suites, additions, site plans, or structural reports in Ottawa. Call 613-213-0789 or email buildingdoctors@outlook.com.',
    'path' => '/contact',
];

require __DIR__ . '/includes/header.php';
?>

<section class="site-hero" style="--hero-image: url('/assets/img/portfolio-4.jpg')">
  <div class="container">
    <div class="row align-items-end site-hero-row">
      <div class="col-12 col-lg-10 col-xl-9">
        <p class="site-hero-eyebrow">Contact</p>
        <h1>Tell us what you’re building in Ottawa.</h1>
        <p class="site-hero-lead">Share your address and project scope. We’ll confirm the permit path and reply within one business day.</p>
        <div class="d-flex flex-wrap gap-3">
          <a class="btn btn-primary" href="#quote-form">Send project details</a>
          <a class="btn btn-secondary" href="tel:<?= e($config['phone_tel']) ?>">Call <?= e($config['phone']) ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-white">
  <div class="container">
    <div class="row g-4 g-lg-5">
      <div class="col-12 col-lg-5">
        <aside class="contact-card reveal h-100">
          <h2>Reach the team</h2>
          <ul class="contact-list">
            <li>
              <span>Phone</span>
              <a href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
            </li>
            <li>
              <span>Email</span>
              <a href="mailto:<?= e($config['email']) ?>"><?= e($config['email']) ?></a>
            </li>
            <li>
              <span>WhatsApp</span>
              <a href="https://wa.me/<?= e($config['whatsapp']) ?>" target="_blank" rel="noopener">Message <?= e($config['phone']) ?></a>
            </li>
            <li>
              <span>Location</span>
              <strong><?= e($config['address']['display']) ?></strong>
            </li>
            <li>
              <span>Turnaround</span>
              <strong>Most packages in 10–14 business days</strong>
            </li>
          </ul>
          <div class="mt-4">
            <iframe
              title="Building Doctors location map"
              src="https://maps.google.com/maps?q=Nepean%20ON%20K2J%207L6&t=&z=12&ie=UTF8&iwloc=&output=embed"
              width="100%"
              height="220"
              style="border:0; border-radius: 4px;"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </aside>
      </div>

      <div class="col-12 col-lg-7">
        <div class="form-card reveal" id="quote-form">
          <h2>Request a quote</h2>
          <p class="form-intro">Send project details below. We’ll reply by email or phone.</p>

          <form action="<?= e($config['formspree_endpoint']) ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_subject" value="New Building Doctors quote request">
            <input type="hidden" name="_next" value="<?= e(rtrim($config['domain'], '/') . '/contact?status=success') ?>">
            <input type="text" name="_gotcha" value="" style="display:none" tabindex="-1" autocomplete="off">

            <div class="row g-3">
              <div class="col-12 col-md-6">
                <div class="form-row">
                  <label for="name">Full name *</label>
                  <input id="name" name="name" type="text" required autocomplete="name">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-row">
                  <label for="email">Email *</label>
                  <input id="email" name="email" type="email" required autocomplete="email">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-row">
                  <label for="phone">Phone *</label>
                  <input id="phone" name="phone" type="tel" required autocomplete="tel">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-row">
                  <label for="address">Project address</label>
                  <input id="address" name="address" type="text" autocomplete="street-address">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-row">
                  <label for="municipality">Municipality</label>
                  <select id="municipality" name="municipality">
                    <option value="">Select…</option>
                    <?php foreach ($config['service_areas'] as $area): ?>
                      <option value="<?= e($area) ?>"><?= e($area) ?></option>
                    <?php endforeach; ?>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-row">
                  <label for="project_type">Project type *</label>
                  <select id="project_type" name="project_type" required>
                    <option value="">Select…</option>
                    <?php foreach ($services as $service): ?>
                      <option value="<?= e($service['title']) ?>"><?= e($service['title']) ?></option>
                    <?php endforeach; ?>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-row">
                  <label for="message">Project details *</label>
                  <textarea id="message" name="message" required placeholder="Describe the work, timelines, and any city comments you already received."></textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="form-row">
                  <label for="attachment">Upload sketch or photo (optional)</label>
                  <input id="attachment" name="attachment" type="file" accept=".pdf,.jpg,.jpeg,.png,.webp">
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" type="submit">Send Inquiry</button>
              </div>
            </div>
          </form>

          <?php if (($_GET['status'] ?? '') === 'success'): ?>
            <div class="form-alert success mt-3">Thank you. Your inquiry was sent. We’ll be in touch shortly.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
