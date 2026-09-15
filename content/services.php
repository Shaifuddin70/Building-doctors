<?php
declare(strict_types=1);

/**
 * Service catalogue — future admin can edit this file or load from DB.
 */
return [
    [
        'id' => 'permit-drawings',
        'title' => 'Permit Drawings',
        'short' => 'Full architectural drawing packages prepared to City of Ottawa standards — stamped, sealed, and submission-ready.',
        'description' => 'We prepare complete building permit drawing packages for residential and light commercial projects across Ottawa and surrounding municipalities. Every set is reviewed against the Ontario Building Code and local submission requirements so your contractor can stay on site and your application moves through review with fewer comment cycles.',
        'includes' => [
            'Site plans, floor plans, elevations, and sections',
            'Code notes and construction details',
            'Municipal submission coordination support',
            'City comment response and drawing revisions',
        ],
        'image' => '/assets/img/service-permit.jpg',
        'layout' => 'split-right',
        'tone' => 'navy',
        'tagline' => 'Submission-ready packages',
    ],
    [
        'id' => 'home-additions',
        'title' => 'Home Additions',
        'short' => 'Second-storey, rear, and garage additions designed within your zoning envelope — with variance risks flagged early.',
        'description' => 'Whether you need a rear addition, second storey, or garage conversion, we design additions that fit your lot, lifestyle, and municipal zoning. We review setbacks, coverage, and height before drawings start so minor variance requirements are identified before they become costly surprises.',
        'includes' => [
            'Zoning and envelope review',
            'Existing and proposed floor plans',
            'Elevations and structural coordination',
            'Permit-ready architectural packages',
        ],
        'image' => '/assets/img/service-addition.jpg',
        'layout' => 'split-left',
        'tone' => 'white',
        'tagline' => 'Designed for your lot',
    ],
    [
        'id' => 'basement-permits',
        'title' => 'Basement & Secondary Unit Permits',
        'short' => 'Legal basement apartment and secondary suite drawings aligned with Ottawa residential intensification policy.',
        'description' => 'Secondary suites unlock rental potential — but only when egress, ceiling height, fire separation, and HVAC requirements are designed correctly. We prepare basement and second-unit permit packages that meet Ottawa and surrounding municipal standards for legal secondary dwellings.',
        'includes' => [
            'Egress and fire separation layouts',
            'Ceiling height and window compliance',
            'Plumbing and mechanical coordination notes',
            'Separate entrance / walkout drawing support',
        ],
        'image' => '/assets/img/service-basement.jpg',
        'layout' => 'feature',
        'tone' => 'concrete',
        'tagline' => 'Legal suites, done right',
    ],
    [
        'id' => 'site-plans',
        'title' => 'Site Plans',
        'short' => 'Grading, drainage, landscaping, and servicing drawings prepared for municipal site plan approval.',
        'description' => 'Many Ottawa-area projects require a detailed site plan before a building permit can proceed. We prepare site plan packages including grading and drainage, servicing concepts, landscaping, and stormwater notes — formatted for municipal review and agency circulation.',
        'includes' => [
            'Building location and setback plans',
            'Grading and drainage concepts',
            'Landscaping and parking layouts',
            'Submission support for municipal review',
        ],
        'image' => '/assets/img/service-siteplan.jpg',
        'layout' => 'split-right',
        'tone' => 'white',
        'tagline' => 'Grading to approval',
    ],
    [
        'id' => 'committee-of-adjustment',
        'title' => 'Committee of Adjustment',
        'short' => 'Minor variance and consent applications with supporting plans — we can act as your agent through the process.',
        'description' => 'When a project needs a small deviation from zoning — such as a setback or coverage relief — a Committee of Adjustment application may be required. We prepare supporting drawings and can act as your agent for filing, neighbour notification coordination, and committee attendance guidance.',
        'includes' => [
            'Minor variance supporting drawings',
            'Grading and survey interpretation support',
            'Application package preparation',
            'Agent representation through CoA process',
        ],
        'image' => '/assets/img/service-coa.jpg',
        'layout' => 'split-left',
        'tone' => 'navy',
        'tagline' => 'Variance support',
    ],
    [
        'id' => 'structural-reports',
        'title' => 'Structural Reports',
        'short' => 'Load calculations, beam sizing, and engineer-stamped letters for lenders and building officials.',
        'description' => 'Removing a load-bearing wall, resizing an opening, or satisfying a lender often requires a Professional Engineer’s assessment. Our structural reports include load calculations, beam sizing, foundation notes where applicable, and P.Eng-stamped documentation for municipal and financing requirements.',
        'includes' => [
            'Beam and opening sizing',
            'Load path assessment',
            'Foundation and alteration letters',
            'P.Eng stamp and seal',
        ],
        'image' => '/assets/img/service-structural.jpg',
        'layout' => 'cards',
        'tone' => 'concrete',
        'tagline' => 'P.Eng stamped',
    ],
];
