<?php
declare(strict_types=1);

/** @var array $item */
$modalId = 'project-' . $item['id'];
$gallery = $item['gallery'] ?? [];
?>
<div class="modal fade project-modal" id="<?= e($modalId) ?>" tabindex="-1" aria-labelledby="<?= e($modalId) ?>-title" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <p class="portfolio-meta mb-1"><?= e($item['type']) ?></p>
          <h2 class="modal-title" id="<?= e($modalId) ?>-title"><?= e($item['title']) ?></h2>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="project-summary"><?= e($item['summary']) ?></p>

        <?php if (!empty($item['compare'])):
            $compare = $item['compare'];
            require __DIR__ . '/compare-slider.php';
        endif; ?>

        <?php if ($gallery): ?>
          <div class="row g-3 project-gallery">
            <?php foreach ($gallery as $shot):
                $isPdf = isset($shot['pdf']);
            ?>
              <div class="col-12<?= count($gallery) > 1 ? ' col-md-6' : '' ?>">
                <a class="project-shot" href="<?= e($isPdf ? $shot['pdf'] : $shot['src']) ?>" target="_blank" rel="noopener">
                  <img src="<?= e($shot['src']) ?>" alt="<?= e($shot['caption']) ?>" loading="lazy">
                  <span class="project-shot-caption">
                    <span><?= e($shot['caption']) ?></span>
                    <span class="project-shot-action"><?= $isPdf ? 'Open PDF' : 'Full size' ?></span>
                  </span>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" href="/contact">Start a similar project</a>
      </div>
    </div>
  </div>
</div>
