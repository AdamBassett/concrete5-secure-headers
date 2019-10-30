<?php

return [
    'guest'=>[
        'default-src' => ["'self'"],
        'script-src' => ["'self'", 'https:', '*.jquery.com', '*.cloudflare.com', 'stackpath.bootstrapcdn.com'],
        'style-src' => ["'self'", 'unsafe-inline', 'stackpath.bootstrapcdn.com'],
        'img-src' => ["'self'", 'pawsonweb.com'],
        'connect-src' => ["'self'"],
        'font-src' => ["'self'"],
        'object-src' => ["'self'"],
        'media-src' => ["'self'"],
        'base-uri' => ["'self'"],
        'frame-src' => ["'self'"],
        'child-src' => ["'self'"],
        'form-action' => ["'self'"],
        'frame-ancestors' => ["'self'"],
    ],
    'user' =>[
        'default-src' => ["'self'"],
        'script-src' => ["'self'", 'https:', '*.jquery.com', '*.cloudflare.com', 'stackpath.bootstrapcdn.com', "'unsafe-inline'", "'unsafe-eval'"],
        'style-src' => ["'self'", 'stackpath.bootstrapcdn.com',"'unsafe-inline'"],
        'img-src' => ["'self'", 'pawsonweb.com'],
        'connect-src' => ["'self'"],
        'font-src' => ["'self'"],
        'object-src' => ["'self'"],
        'media-src' => ["'self'"],
        'base-uri' => ["'self'"],
        'frame-src' => ["'self'"],
        'child-src' => ["'self'"],
        'form-action' => ["'self'"],
        'frame-ancestors' => ["'self'"],
    ]
];