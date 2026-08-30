# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

Laravel 12 app ("Kidoo") that runs a multi-tenant CMS + admin backend for kindergarten/school websites. One codebase serves many schools/domains; each school has its own theme, pages, posts, classes, students, teachers, and tuition records, all scoped by `school_id`.

## Commands

- `composer install`, `npm install` — install dependencies.
- `composer run dev` — runs `php artisan serve`, `queue:listen`, `pail` (logs), and `npm run dev` (Vite) concurrently.
- `php artisan serve` — app server only.
- `npm run dev` / `npm run build` — Vite dev server / production asset build (Tailwind v4, no JS framework).
- `php artisan migrate` — run migrations.
- `composer test` or `php artisan test` — clears config cache then runs the Pest/PHPUnit suite.
- Single test: `php artisan test --filter=<name>` or `vendor/bin/pest tests/Feature/ExampleTest.php`.
- `vendor/bin/pint` — code style (Laravel Pint is a dev dependency; no custom `pint.json`).

## Architecture

### Multi-tenancy by domain
Every request is tied to a school by matching `$request->getHost()` against the `schools` table. `App\Http\Controllers\BaseController` and `App\Http\Controllers\Admin\BaseController` both do this in their constructor and expose the row as `$this->app['school']`. New controllers that need tenant context should extend one of these. Almost every query in the codebase filters on `school_id` — keep doing that for new queries.

### Theming
`App\Http\Middleware\LoadTheme` is appended globally to the `web` middleware group (`bootstrap/app.php`). It looks up the school's theme (`schools.theme_id` -> `themes` table), then registers a Blade namespace `theme::` -> `resources/views/themes/{theme}`. Public-facing views are rendered as `theme::...`. A `theme_preview` session value (set via `GET /preview?theme=&time=&verify=`, md5-checked against `'kidoo'.$time.$theme`) can temporarily override the active theme on a live domain; `/stop-preview` clears it.

Theme view sets live under `resources/views/themes/{name}/{layouts,partials,blocks}`; `resources/views/themes/common` holds partials shared across themes. The root `templates/` and `tada/templates/` directories hold the original purchased HTML/admin template sources the themes were adapted from — they are static reference assets, not part of the running app.

### Page building (block CMS)
Pages are composed of `page_blocks` rows (ordered by `sort`) that each reference a `blocks` definition (`code` + JSON `data`). `HomeController::block()` switches on `blocks.code` (`programs`, `teachers`, `testimonials`, `article_teaser`, `articles_teasers`, `gallery`, `hero_banner`, `metrics`, ...) to fetch the right data and render `theme::blocks.{code}`. Adding a new block type means adding a new `if ($block->code == '...')` branch there plus a matching `blocks/{code}.blade.php` per theme.

Slugs for pages and posts resolve through the `routings` table (`slug`, `entity`, `entity_id`), managed by `getSlug()` / `updateSlug()` in `app/helpers.php`. The catch-all front route `GET /{slug}` (`HomeController::show`) looks up `routings` and dispatches to `page()` or `post()`.

### Admin panel
Controllers in `App\Http\Controllers\Admin` extend `Admin\BaseController` and are CRUD-style (`index/show/create/store/edit/update/destroy`), registered with `Route::resource(...)->only([...])` in `routes/web.php`. Admin routes run under `[StartSession, CheckLogin]` middleware.

`CheckLogin` requires an authenticated user. For any route other than the bare `/admin` index, it splits the **route name** as `{resource}.{action}` and checks the `users_permissions` (joined to `permissions`) table for that user + school + resource; on failure it renders `admin.errors.permission_denied`. New admin routes must be named `resource.action` or this permission check breaks.

### Data access
There is no repository/service layer and, aside from `App\Models\User` (used by `Auth`), no Eloquent models — all reads/writes go through `DB::table()` (`get()/first()`, `insertGetId()`, `update()`, `delete()`). Follow this convention for new features rather than introducing Eloquent models; `reliese/laravel` is a dependency (an Eloquent model generator) but isn't currently used to generate anything.

Soft deletes are hand-rolled: a `deleted_at` column filtered manually with `whereNull('deleted_at')` — not the Eloquent `SoftDeletes` trait.

Global helpers autoloaded via Composer's `files` autoload live in `app/helpers.php` (photo/thumbnail lookup, slug helpers, Imagick-based image resizing, srcset building). Note that `getImageSet()` and `resizeImageByWidth()` hardcode the production path `/var/www/kidoo/public/` instead of `public_path()`, so they only behave correctly on that server. `spatie/image` is used directly in controllers (e.g. `HomeController::get_photo`) for on-the-fly resizing as an alternative path.

## Testing

- Pest (`pestphp/pest` + `pest-plugin-laravel`). `tests/Pest.php` binds `Tests\TestCase` for the `Feature` directory; `RefreshDatabase` is commented out there, so Feature tests do **not** reset the database automatically.
- `phpunit.xml` forces `DB_CONNECTION=sqlite` / `DB_DATABASE=:memory:` for the `testing` environment, independent of the app's normal MySQL connection.
- Only the default Pest/Laravel example tests exist (`tests/Feature/ExampleTest.php`, `tests/Unit/ExampleTest.php`) — there is no real feature coverage yet.

## Other notes

- `POST /admin/upload` explicitly disables CSRF validation (`withoutMiddleware([ValidateCsrfToken::class])`).
- Local/dev DB is MySQL (`.env.example`); test env is SQLite in-memory regardless (see Testing above).
