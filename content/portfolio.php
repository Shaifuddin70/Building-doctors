<?php
declare(strict_types=1);

/**
 * Portfolio projects. `image` is the card cover, `compare` renders a before/after
 * slider, and `gallery` items with a `pdf` key link to the original drawing sheet.
 */
return (static function (): array {
$works = '/assets/img/works';
$previews = $works . '/previews';

return [
    [
        'id' => 'side-basement-walkout',
        'title' => 'Side-Yard Basement Walkout Entrance',
        'type' => 'Basement & Walkout',
        'summary' => 'A separate basement entrance cut into the side yard of a brick two-storey home, with a guarded stairwell, exterior lighting, and a new door at the lower level.',
        'image' => "$works/basement-walkout-side-after.png",
        'compare' => [
            'before' => "$works/basement-walkout-side-before.png",
            'after' => "$works/basement-walkout-side-after.png",
            'alt' => 'Brick two-storey home with a new side-yard basement walkout entrance',
        ],
        'gallery' => [],
    ],
    [
        'id' => 'apartment-building',
        'title' => 'Eight-Storey Residential Building — Architectural Set',
        'type' => 'Architectural Drawings',
        'summary' => 'Architectural drawings for an eight-storey residential building over ground-floor parking: typical floor plan, parking layout, east elevation, and building section.',
        'image' => "$previews/apartment-building-east-elevation.jpg",
        'gallery' => [
            ['src' => "$previews/apartment-building-east-elevation.jpg", 'pdf' => "$works/apartment-building-east-elevation.pdf", 'caption' => 'East elevation'],
            ['src' => "$previews/apartment-building-typical-floor-plan.jpg", 'pdf' => "$works/apartment-building-typical-floor-plan.pdf", 'caption' => '1st to 8th floor plan'],
            ['src' => "$previews/apartment-building-ground-floor-parking-plan.jpg", 'pdf' => "$works/apartment-building-ground-floor-parking-plan.pdf", 'caption' => 'Ground floor parking plan'],
            ['src' => "$previews/apartment-building-section-aa.jpg", 'pdf' => "$works/apartment-building-section-aa.pdf", 'caption' => 'Section A-A'],
        ],
    ],
    [
        'id' => 'steel-building-structural',
        'title' => 'Steel-Framed Building — Structural Drawing Set',
        'type' => 'Structural Drawings',
        'summary' => 'Structural steel package covering the base plate and anchor bolt plan, frame elevations with column and beam schedules, roof bracing and purlin layout, and connection details.',
        'image' => "$previews/steel-building-upper-bracing-purlin-plan.jpg",
        'gallery' => [
            ['src' => "$previews/steel-building-base-plate-anchor-bolt-plan.jpg", 'pdf' => "$works/steel-building-base-plate-anchor-bolt-plan.pdf", 'caption' => 'Base plate plan & anchor bolt details'],
            ['src' => "$previews/steel-building-frame-elevations-axes-2-10.jpg", 'pdf' => "$works/steel-building-frame-elevations-axes-2-10.pdf", 'caption' => 'Frame elevations — axes 2 to 10'],
            ['src' => "$previews/steel-building-frame-elevations-axes-1-11.jpg", 'pdf' => "$works/steel-building-frame-elevations-axes-1-11.pdf", 'caption' => 'Frame elevations — axes 1 & 11'],
            ['src' => "$previews/steel-building-upper-bracing-purlin-plan.jpg", 'pdf' => "$works/steel-building-upper-bracing-purlin-plan.pdf", 'caption' => 'Upper bracing plan & purlin details'],
            ['src' => "$previews/steel-building-bracing-connection-details.jpg", 'pdf' => "$works/steel-building-bracing-connection-details.pdf", 'caption' => 'Bracing & connection details'],
        ],
    ],
    [
        'id' => 'rear-basement-walkout',
        'title' => 'Rear-Yard Basement Walkout',
        'type' => 'Basement & Walkout',
        'summary' => 'A new below-grade stairwell and basement door added off the rear patio, with concrete retaining walls and black metal guards.',
        'image' => "$works/basement-walkout-rear-before-after.png",
        'image_position' => 'right center',
        'gallery' => [
            ['src' => "$works/basement-walkout-rear-before-after.png", 'caption' => 'Before and after — rear basement walkout'],
        ],
    ],
    [
        'id' => 'craftsman-elevation',
        'title' => 'Craftsman-Style Home — Front Elevation',
        'type' => 'Architectural Drawings',
        'summary' => 'A rendered front elevation of a two-and-a-half-storey craftsman home, showing the gable dormer, shingle detailing, covered front porch, and street grade.',
        'image' => "$works/craftsman-house-front-elevation.png",
        'gallery' => [
            ['src' => "$works/craftsman-house-front-elevation.png", 'caption' => 'Front elevation'],
        ],
    ],
    [
        'id' => 'landscaped-site-plan',
        'title' => 'Landscaped Site Plan & Main Floor Layout',
        'type' => 'Site Plan',
        'summary' => 'A site plan showing the main floor layout in context with the rear deck, patio dining area, detached garage, driveway, and tree and hedge planting.',
        'image' => "$works/site-plan-landscape-main-floor.png",
        'gallery' => [
            ['src' => "$works/site-plan-landscape-main-floor.png", 'caption' => 'Site plan with main floor layout'],
        ],
    ],
    [
        'id' => 'portal-frame',
        'title' => 'Steel Portal Frame Design',
        'type' => 'Structural Drawings',
        'summary' => 'Portal frame section with universal beam rafters and columns, eave and apex haunch details, slab build-up, and general structural steel notes.',
        'image' => "$previews/portal-frame-section-and-details.jpg",
        'gallery' => [
            ['src' => "$previews/portal-frame-section-and-details.jpg", 'pdf' => "$works/portal-frame-section-and-details.pdf", 'caption' => 'Section A-A, haunch details & general notes'],
        ],
    ],
];
})();
