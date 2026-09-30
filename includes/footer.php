<?php
declare(strict_types=1);

/** @var array $config */
/** @var array $services */
?>
  </main>

  <footer class="site-footer">
    <div class="container">
      <div class="row g-4 g-lg-5">
        <div class="col-12 col-lg-4">
          <a class="brand brand-footer" href="/">
            <img class="brand-mark" src="/assets/img/brand-mark.png" width="161" height="128" alt="">
            <span class="brand-text">
              <span class="brand-name">Building Doctors</span>
              <span class="brand-tag"><?= e($config['tagline']) ?></span>
            </span>
          </a>
          <p class="footer-blurb">Architectural drafting, permit drawings, and structural reports for homeowners, contractors, and developers across Greater Ottawa.</p>
          <div class="footer-cta d-flex flex-wrap gap-2 mt-3">
            <a class="btn btn-primary btn-sm" href="/contact">Get a Quote</a>
            <a class="btn btn-outline-light btn-sm" href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
          <h2 class="footer-heading">Services</h2>
          <ul class="footer-list">
            <?php foreach (array_slice($services, 0, 6) as $service): ?>
              <li><a href="/services#<?= e($service['id']) ?>"><?= e($service['title']) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
          <h2 class="footer-heading">Company</h2>
          <ul class="footer-list">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/portfolio">Portfolio</a></li>
            <li><a href="/services">All Services</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
          <h2 class="footer-heading mt-4">Service Areas</h2>
          <ul class="footer-list footer-list-inline">
            <?php foreach (array_slice($config['service_areas'], 0, 6) as $i => $area): ?>
              <li><?= e($area) ?><?= $i < 5 ? ',' : '' ?></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="col-12 col-md-4 col-lg-3">
          <h2 class="footer-heading">Contact</h2>
          <ul class="footer-list footer-contact">
            <li>
              <span class="footer-label">Phone</span>
              <a href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a>
            </li>
            <li>
              <span class="footer-label">Email</span>
              <a href="mailto:<?= e($config['email']) ?>"><?= e($config['email']) ?></a>
            </li>
            <li>
              <span class="footer-label">Location</span>
              <span><?= e($config['address']['display']) ?></span>
            </li>
            <li>
              <span class="footer-label">Connect</span>
              <div class="footer-social">
                <a class="social-link social-link-whatsapp" href="https://wa.me/<?= e($config['whatsapp']) ?>" target="_blank" rel="noopener" aria-label="Message Building Doctors on WhatsApp" title="WhatsApp">
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.39-1.47-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.62-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.21 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.18-1.41-.07-.13-.27-.2-.57-.35Zm-5.42 7.4h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 6.99c0 5.45-4.44 9.88-9.88 9.88Zm8.41-18.3A11.81 11.81 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.89c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.68 1.45h.01c6.55 0 11.89-5.34 11.89-11.89 0-3.18-1.24-6.16-3.48-8.41Z"/></svg>
                </a>
                <?php if (!empty($config['social']['instagram'])): ?>
                  <a class="social-link social-link-instagram" href="<?= e($config['social']['instagram']) ?>" target="_blank" rel="noopener" aria-label="Building Doctors on Instagram" title="Instagram">
                    <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4.2"/><circle cx="17.4" cy="6.6" r="1.1" fill="currentColor" stroke="none"/></svg>
                  </a>
                <?php endif; ?>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom row align-items-md-center g-2">
        <div class="col-12 col-md-6">
          <p class="mb-0">&copy; <?= date('Y') ?> <?= e($config['site_name']) ?>. All rights reserved.</p>
        </div>
        <div class="col-12 col-md-6 text-md-end">
          <p class="footer-note mb-0">P.Eng licensed practice. Not an architecture firm.</p>
        </div>
      </div>
    </div>
  </footer>

  <a class="mobile-call d-lg-none" href="tel:<?= e($config['phone_tel']) ?>" aria-label="Call Building Doctors">Call</a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/main.js?v=20261001" defer></script>
</body>
</html>
