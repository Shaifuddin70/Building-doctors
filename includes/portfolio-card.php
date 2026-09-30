<?php
declare(strict_types=1);

/** @var array $item */
$sheetCount = count(array_filter($item['gallery'] ?? [], static fn(array $shot): bool => isset($shot['pdf'])));
$cardMeta = array_filter([
    $item['type'],
    $item['location'] ?? null,
    isset($item['compare']) ? 'Before / After' : null,
    $sheetCount > 1 ? $sheetCount . ' sheets' : null,
]);
?>
<article class="portfolio-card h-100 reveal" style="--card-image: url('<?= e($item['image']) ?>')<?= isset($item['image_position']) ? '; --card-position: ' . e($item['image_position']) : '' ?>">
  <div class="portfolio-meta"><?= e(implode(' · ', $cardMeta)) ?></div>
  <h3><?= e($item['title']) ?></h3>
  <p><?= e($item['summary']) ?></p>
  <button class="portfolio-card-link stretched-link" type="button" data-bs-toggle="modal" data-bs-target="#project-<?= e($item['id']) ?>">
    <span class="link-arrow">View project</span>
  </button>
</article>
