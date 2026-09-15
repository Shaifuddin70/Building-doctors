<?php
declare(strict_types=1);

/** @var array $config */
/** @var array $services */
?>
  </main>

  <footer class="site-footer">
    <div class="container footer-grid">
      <div class="footer-brand">
        <a class="brand brand-footer" href="/">
          <img src="/assets/img/logo.svg" width="48" height="48" alt="">
          <span class="brand-text">
            <span class="brand-name">Building Doctors</span>
            <span class="brand-tag"><?= e($config['tagline']) ?></span>
          </span>
        </a>
        <p>Architectural drafting, permit drawings, and structural reports for homeowners, contractors, and developers across Greater Ottawa.</p>
      </div>

      <div>
        <h2 class="footer-heading">Services</h2>
        <ul class="footer-list">
          <?php foreach (array_slice($services, 0, 6) as $service): ?>
            <li><a href="/services#<?= e($service['id']) ?>"><?= e($service['title']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <h2 class="footer-heading">Service Areas</h2>
        <ul class="footer-list">
          <?php foreach (array_slice($config['service_areas'], 0, 6) as $area): ?>
            <li><?= e($area) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <h2 class="footer-heading">Contact</h2>
        <ul class="footer-list">
          <li><a href="tel:<?= e($config['phone_tel']) ?>"><?= e($config['phone']) ?></a></li>
          <li><a href="mailto:<?= e($config['email']) ?>"><?= e($config['email']) ?></a></li>
          <li><?= e($config['address']['display']) ?></li>
          <li><a href="https://wa.me/<?= e($config['whatsapp']) ?>" target="_blank" rel="noopener">WhatsApp</a></li>
        </ul>
      </div>
    </div>

    <div class="container footer-bottom">
      <p>&copy; <?= date('Y') ?> <?= e($config['site_name']) ?>. All rights reserved.</p>
      <p class="footer-note">P.Eng licensed practice providing drafting and engineering documentation. Not an architecture firm.</p>
    </div>
  </footer>

  <a class="mobile-call" href="tel:<?= e($config['phone_tel']) ?>" aria-label="Call Building Doctors">Call</a>

  <script src="/assets/js/main.js" defer></script>
</body>
</html>
