<?php

namespace RippleDevs\LaravelFaker\Providers;

use Faker\Generator;
use Illuminate\Support\ServiceProvider;
use RippleDevs\LaravelFaker\Faker\PersianFaker;

class LaravelFakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->resolving(Generator::class, function ($faker) {
            $faker->addProvider(new PersianFaker($faker));
        });
    }
}
