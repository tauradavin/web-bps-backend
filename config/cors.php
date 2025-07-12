<?php

return [
    'paths' => ['api/*'],  // Hanya endpoint API yang diizinkan
    'allowed_methods' => ['*'],  // Semua metode HTTP diizinkan (GET, POST, PUT, DELETE, dll)
    
    'allowed_origins' => [
        'http://localhost:5173', // Untuk pengujian lokal
        'https://web-bps-frontend-topaz.vercel.app', // ← Ganti sesuai domain Vercel kamu
    ],
    
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],  // Semua header diizinkan
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,  // Izinkan pengiriman cookies/token
];
