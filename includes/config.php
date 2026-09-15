<?php
declare(strict_types=1);

/**
 * Site configuration — swap values here when going live or adding admin later.
 */
return [
    'site_name' => 'Building Doctors',
    'tagline' => 'Design · Drafting · Engineering',
    'domain' => 'https://buildingdoctors.ca',
    'email' => 'buildingdoctors@outlook.com',
    'phone' => '613-213-0789',
    'phone_tel' => '+16132130789',
    'whatsapp' => '16132130789',
    'address' => [
        'street' => 'Les Emmerson Dr',
        'city' => 'Nepean',
        'region' => 'ON',
        'postal' => 'K2J 7L6',
        'country' => 'Canada',
        'display' => 'Les Emmerson Dr, Nepean, ON K2J 7L6',
    ],
    'contact_person' => 'Arun',
    'service_areas' => [
        'Ottawa',
        'Nepean',
        'Kanata',
        'Barrhaven',
        'Gloucester',
        'Stittsville',
        'Orleans',
        'Greater Ottawa Area',
    ],
    'stats' => [
        ['value' => '100+', 'label' => 'Projects Delivered'],
        ['value' => '98%', 'label' => 'Permit Approval Rate'],
        ['value' => 'P.Eng', 'label' => 'Licensed in Ontario'],
        ['value' => '10–14', 'label' => 'Day Avg. Turnaround'],
    ],
    'social' => [
        'instagram' => '',
        'facebook' => '',
    ],
    // Create a form at https://formspree.io and paste your endpoint below.
    'formspree_endpoint' => 'https://formspree.io/f/YOUR_FORM_ID',
];
