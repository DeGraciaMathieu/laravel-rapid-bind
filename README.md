
<p align="center">
    <img style='height: 350px' src='https://github.com/DeGraciaMathieu/laravel-rapid-bind/assets/11473997/17e2a556-e081-4889-8ae4-30f074e41686'>
</p>

# laravel-rapid-bind

[![testing](https://github.com/DeGraciaMathieu/laravel-rapid-bind/actions/workflows/testing.yml/badge.svg)](https://github.com/DeGraciaMathieu/laravel-rapid-bind/actions/workflows/testing.yml)

In an architecture based on ports and adapters, we create many bindings between interfaces and implementations.

Often, these bindings are simple and require no additional configuration.

This package facilitates the creation of these bindings, helping you avoid cluttering your `AppServiceProvider`.

## Usage

Provide information on the folders containing the interfaces : 

```php
<?php

namespace App\Providers;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        RapidBind::bind([
            '../app/Domain/Ports/Repositories',
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
```

Now, add the Bind annotation on the port with the value of the FQCN of the associated adapter :

```php
<?php

namespace App\Domain\Ports\Repositories;

use App\Infrastructure\Repositories\UserRepositoryAdapter;

#[Bind(UserRepositoryAdapter::class)]
interface UserRepository
{
    //
}
```

From now on, a singleton has been automatically created between the port and the adapter !

