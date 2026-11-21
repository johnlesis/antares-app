# antares-app

The skeleton application for [Antares](https://github.com/johnlesis/antares), a lightweight API-focused PHP framework for PHP 8.2+, built around explicitness, type safety, and contract-first design.

📖 **Documentation:** [antares-framework.vercel.app](https://antares-framework.vercel.app/)

## Creator Message

This started as a passion project — I wanted to understand the "magic" other 
frameworks offer, magic I always found a bit too hand-wavy for my taste.

I work with PHP professionally and after playing around with other languages and 
frameworks I kept coming back to it. What started as a simple validation and hydration 
package eventually snowballed into this.

I care a lot about contract-first design — explicit in/out contracts on every endpoint. 
Especially in microservices this matters: it keeps things predictable, integrations 
honest, and adds a natural layer of security by making sure data is always validated 
and shaped before it touches your business logic.

Building this taught me more than I expected — not just about frameworks but about 
why the design decisions in the ones I'd been using for years actually exist. That 
alone made it worth it.

A stable v1 for me means I've built the core myself and added enough bridges to 
popular packages that you can make real choices about your stack without being forced 
into anything. Until then I'd hold off on production use — it's not there yet.

This is open source because that's what open source is for. Give it a try, break 
things, open issues, contribute — all of it is welcome.

ORM and other heavy dependencies are left out on purpose. That's your call, not mine.

## Requirements

- PHP 8.2+
- Composer
- For migrations: the PDO extension for your database (`pdo_mysql`, `pdo_pgsql`, `pdo_sqlite`, `pdo_sqlsrv` or `pdo_oci`)

## Create a Project

```bash
composer create-project fatjon-lleshi/antares-app my-api
cd my-api
```

This installs the framework and copies `.env.example` to `.env`. Edit `.env` to set your database credentials and other settings (see [Configuration](#configuration)).

## Run It

```bash
composer serve
```

This starts PHP's built-in server on [http://localhost:8080](http://localhost:8080). It runs:

```bash
php -S localhost:8080 -t public public/index.php
```

Keep the `public/index.php` at the end if you start the server yourself. Without it, PHP serves paths that look like files (such as `/openapi.json`) as static files and returns its own 404.

Then open:

| URL | What you get |
|---|---|
| [http://localhost:8080/](http://localhost:8080/) | A welcome message |
| [http://localhost:8080/health](http://localhost:8080/health) | `{"status": "ok"}` |
| [http://localhost:8080/docs](http://localhost:8080/docs) | Swagger UI for your API, generated from your code |
| [http://localhost:8080/openapi.json](http://localhost:8080/openapi.json) | The OpenAPI 3 spec |

The built-in server is for development only. In production, point your web server (nginx + PHP-FPM, Apache, …) at the `public/` directory, or use one of the worker runtimes below.

### FrankenPHP (worker mode)

`worker.php` keeps the app booted between requests:

```bash
frankenphp php-server --worker worker.php
```

### Swoole

`swoole.php` starts a Swoole HTTP server (requires the `swoole` extension):

```bash
composer require ilexn/swoole-psr7
php swoole.php
```

See [Application](https://antares-framework.vercel.app/core/application/#running-the-app) for how each runtime works.

## Project Structure

```
my-api/
├── app/
│   ├── Controllers/          WelcomeController: the / and /health routes
│   ├── DTOs/
│   │   ├── Request/          CreateUserRequest: an example request DTO with validation
│   │   └── Response/         UserResponse: an example response DTO
│   ├── Guards/               AuthGuard: an example bearer-token guard
│   ├── Middleware/           CorsMiddleware, configured in config/cors.php
│   ├── Providers/
│   │   ├── AppServiceProvider.php     container bindings
│   │   └── RouteServiceProvider.php   registers your controllers
│   └── Resolvers/            PaginationResolver: an example #[Inject] resolver
├── config/                   app.php, cors.php, routes.php
├── database/migrations/      SQL migrations, run with vendor/bin/antares migrate
├── public/index.php          entry point for PHP-FPM and the built-in server
├── storage/                  cache/ (route cache), logs/, uploads/
├── worker.php                entry point for FrankenPHP worker mode
├── swoole.php                entry point for Swoole
└── .env                      your local settings (not committed)
```

To add an endpoint: create a controller in `app/Controllers`, then register it in `app/Providers/RouteServiceProvider.php`. See [Controllers](https://antares-framework.vercel.app/features/controllers/).

## Configuration

Settings live in `.env`. Real environment variables (from Docker, systemd, your shell, …) override it.

| Variable | Default | What it does |
|---|---|---|
| `APP_ENV` | `local` | Set `production` on live servers: turns on route caching, and turns off error details and API docs by default |
| `APP_DEBUG` | on, off in production | Adds the real error to `500` responses. [More](https://antares-framework.vercel.app/features/error-handling/#debug-mode) |
| `APP_DOCS` | on, off in production | Serves `/docs` and `/openapi.json`. [More](https://antares-framework.vercel.app/features/openapi/#turning-the-docs-on-or-off) |
| `DB_DRIVER`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` | `mysql`, `127.0.0.1`, the driver's port | Database connection for migrations. [More](https://antares-framework.vercel.app/features/migrations/#connection) |
| `CORS_ORIGIN`, `CORS_METHODS`, `CORS_HEADERS`, … | see `config/cors.php` | Settings for `CorsMiddleware` |
| `MAX_REQUESTS` | no limit | FrankenPHP only: restart each worker after this many requests |

On a production server, set at least:

```env
APP_ENV=production
```

## Command Line

Run these from the project root:

```bash
php vendor/bin/antares                                # list all commands
php vendor/bin/antares make:controller UserController
php vendor/bin/antares make:dto CreateUserRequest
php vendor/bin/antares make:response UserResponse
php vendor/bin/antares make:middleware AuthMiddleware
php vendor/bin/antares make:guard JwtGuard
php vendor/bin/antares make:migration create_posts_table
php vendor/bin/antares migrate
php vendor/bin/antares migrate:rollback
php vendor/bin/antares cache:clear
```

See [CLI](https://antares-framework.vercel.app/features/cli/) for what each one creates.

## Learn More

Everything about the framework is in the documentation: [antares-framework.vercel.app](https://antares-framework.vercel.app/)

- [Quick Start](https://antares-framework.vercel.app/getting-started/quick-start/)
- [Controllers](https://antares-framework.vercel.app/features/controllers/) and [DTOs](https://antares-framework.vercel.app/features/dtos/)
- [Response DTOs](https://antares-framework.vercel.app/features/response-dtos/)
- [Guards & Resolvers](https://antares-framework.vercel.app/features/guards/)
- [Error Handling](https://antares-framework.vercel.app/features/error-handling/)
- [OpenAPI](https://antares-framework.vercel.app/features/openapi/)
- [Upgrading to 0.2](https://antares-framework.vercel.app/getting-started/upgrading/)

## License

MIT
