<?php

/**
 * File-based route definitions (alternative to attribute-based routing).
 *
 * Format: [METHOD, PATH, CONTROLLER, ACTION, STATUS_CODE]
 *
 * To use this file, uncomment the registerFromConfig line in RouteServiceProvider.
 */

use App\Controllers\WelcomeController;

return [
    ['GET', '/', WelcomeController::class, 'index', 200],
    ['GET', '/health', WelcomeController::class, 'health', 200],
];
