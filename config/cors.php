<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:5173',
        'https://web-bps-frontend.vercel.app',
        'https://web-bps-frontend-inky.vercel.app',
        'https://web-bps-frontend-vert.vercel.app', // ✅ domain baru ditambahkan
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
