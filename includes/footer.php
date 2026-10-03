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
                  <?= icon('whatsapp') ?>
                </a>
                <?php if (!empty($config['social']['instagram'])): ?>
                  <a class="social-link social-link-instagram" href="<?= e($config['social']['instagram']) ?>" target="_blank" rel="noopener" aria-label="Building Doctors on Instagram" title="Instagram">
                    <?= icon('instagram') ?>
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

  <div class="contact-fab d-lg-none" data-fab>
    <div class="contact-fab-menu" id="contact-fab-menu">
      <a class="contact-fab-item" href="tel:<?= e($config['phone_tel']) ?>" aria-label="Call Building Doctors">
        <span class="contact-fab-label">Call</span>
        <span class="contact-fab-icon contact-fab-call"><?= icon('phone') ?></span>
      </a>
      <a class="contact-fab-item" href="https://wa.me/<?= e($config['whatsapp']) ?>" target="_blank" rel="noopener" aria-label="Message Building Doctors on WhatsApp">
        <span class="contact-fab-label">WhatsApp</span>
        <span class="contact-fab-icon social-link-whatsapp"><?= icon('whatsapp') ?></span>
      </a>
      <?php if (!empty($config['social']['instagram'])): ?>
        <a class="contact-fab-item" href="<?= e($config['social']['instagram']) ?>" target="_blank" rel="noopener" aria-label="Building Doctors on Instagram">
          <span class="contact-fab-label">Instagram</span>
          <span class="contact-fab-icon social-link-instagram"><?= icon('instagram') ?></span>
        </a>
      <?php endif; ?>
    </div>
    <button class="contact-fab-toggle" type="button" aria-expanded="false" aria-controls="contact-fab-menu" aria-label="Open contact options" data-fab-toggle>
      <span class="contact-fab-open"><?= icon('chat') ?></span>
      <span class="contact-fab-close"><?= icon('close') ?></span>
    </button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/main.js?v=20261003b" defer></script>
</body>
</html>
