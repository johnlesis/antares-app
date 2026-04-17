# Antares App

Skeleton application for the [Antares Framework](https://github.com/johnlesis/antares).

## Requirements

- PHP 8.2+
- Composer

## Installation

```bash
composer create-project fatjon-lleshi/antares-app my-api
cd my-api
cp .env.example .env
```

## Development server

```bash
php -S localhost:8080 -t public
```

## Creating controllers and DTOs

```bash
php bin/antares make:controller PatientController
php bin/antares make:dto CreatePatientRequest
```

## Directory structure

```
app/
├── Controllers/    ← your controllers
├── DTOs/           ← request/response DTOs
└── Providers/
    ├── AppServiceProvider.php    ← register bindings
    └── RouteServiceProvider.php  ← register controllers
config/
├── app.php         ← app config
└── routes.php      ← optional file-based routing
public/
└── index.php       ← entry point
storage/
└── cache/          ← route cache (production)
```

## Routing

### Attribute based (recommended)
```php
#[Get('/patients')]
public function list(): array {}
```

### File based
```php
// config/routes.php
return [
    ['GET', '/patients', PatientController::class, 'list', 200],
];
```

### YAML based (requires `composer require symfony/yaml`)

```yaml
# config/routes.yaml
routes:
  - method: GET
    path: /patients
    controller: App\Controllers\PatientController
    action: list
    status: 200

  - method: POST
    path: /patients
    controller: App\Controllers\PatientController
    action: create
    status: 201
```

Register in `RouteServiceProvider`:
```php
$router->registerFromYaml(__DIR__ . '/../../config/routes.yaml');
```

## Middleware

```php
// public/index.php
Application::create(__DIR__ . '/..')
    ->providers([...])
    ->middleware([
        AuthMiddleware::class,
    ])
    ->run();
```

## API Docs

Visit `/docs` for automatic Swagger UI documentation.