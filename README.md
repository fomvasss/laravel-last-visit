# Laravel last visit
A package for fixing the last visit of an authorized user in the system

## Installation

Require this package with composer
```shell
composer require fomvasss/laravel-last-visit
```

Publish package config (if need)
```shell
php artisan vendor:publish --provider="Fomvasss\LastVisit\ServiceProvider"
```

Add middleware to `Http/Kernel.php`, for example in `web` group:
```php
    protected $middlewareGroups = [
        'web' => [
            //...
            \Fomvasss\LastVisit\Middleware\LogLastVisitMiddleware::class,
        ],
    ];
```

## Usage

- Add in your User model next trait: `Visitable` (`Fomvasss\LastVisit\Traits`)

- Use method `isOnline()`

Example:
```php
$users = User::select('id')->get();
foreach ($user as $user) {
    if ($user->isOnline()) {
        $user->last_visit = \Carbon\Carbon::now();
        $user->save();
    }
}
```
This code you can use in CRON schedule.