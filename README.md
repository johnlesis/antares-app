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