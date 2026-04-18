<?php

return [
    'origin'   => $_ENV['CORS_ORIGIN']   ?? '*',
    'methods'  => $_ENV['CORS_METHODS']  ?? 'GET, POST, PUT, PATCH, DELETE, OPTIONS',
    'headers'  => $_ENV['CORS_HEADERS']  ?? 'Content-Type, Authorization',
    'max_age'  => $_ENV['CORS_MAX_AGE']  ?? '86400',
    'exposed_headers' => $_ENV['CORS_EXPOSED_HEADERS'] ?? '',
    'credentials' => $_ENV['CORS_CREDENTIALS'] ?? false,
];