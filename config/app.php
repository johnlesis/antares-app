<?php

return [
    'name'  => $_ENV['APP_NAME'] ?? 'Antares',
    'env'   => $_ENV['APP_ENV'] ?? 'local',
    'debug' => $_ENV['APP_DEBUG'] ?? true,
    'url'   => $_ENV['APP_URL'] ?? 'http://localhost:8080',
];