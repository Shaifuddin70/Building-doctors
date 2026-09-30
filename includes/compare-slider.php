<?php
declare(strict_types=1);

/** @var array $compare before, after, alt */
?>
<div class="compare" data-compare>
  <img class="compare-img" src="<?= e($compare['after']) ?>" alt="<?= e($compare['alt'] ?? 'After') ?>" loading="lazy">
  <img class="compare-img compare-before" src="<?= e($compare['before']) ?>" alt="" loading="lazy">
  <span class="compare-tag compare-tag-before">Before</span>
  <span class="compare-tag compare-tag-after">After</span>
  <span class="compare-handle" aria-hidden="true"></span>
  <input class="compare-range" type="range" min="0" max="100" value="50" aria-label="Drag to compare before and after" data-compare-range>
</div>
