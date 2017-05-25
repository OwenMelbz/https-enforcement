# Laravel 5 HTTPS Enforcement Agent

An automatic piece of middleware for Laravel 5.x, which will redirect users accessing non https urls, to the secure equivalent unless specified in the ignore list


## Usage

1- Install via composer `composer require owenmelbz/https-enforcement`

2- Register the service provider - typically done inside the `app.php` providers array e.g `OwenMelbz\HttpsEnforcement\HttpsEnforcementServiceProvider::class`

3- Add `ENFORCE_HTTPS=true` to your application environment config e.g `.env`

4- Enjoy your stress free architecture agnostic redirects


## Why?

Too often we've wasted time configuring SSL redirection, with proxy systems like CloudFlare, with apache development machines and nginx production, this removes all the headache and can simply be turned off and on at a whim.
