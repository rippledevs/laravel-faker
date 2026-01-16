<?php

namespace RippleDevs\LaravelFaker\Tests;

use Faker\Generator;
use Orchestra\Testbench\TestCase as Orchestra;
use RippleDevs\LaravelFaker\Providers\LaravelFakerServiceProvider;

abstract class TestCase extends Orchestra
{
    protected Generator $faker;

    /**
     * Register package service providers.
     *
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelFakerServiceProvider::class,
        ];
    }

    protected function usePersianFaker(): void
    {
        $this->setFakerLocale('fa_IR');
    }

    protected function useEnglishFaker(): void
    {
        $this->setFakerLocale('en_US');
    }

    protected function setFakerLocale(string $locale): void
    {
        config(['app.faker_locale' => $locale]);

        $this->app->forgetInstance(Generator::class);

        $this->faker = $this->app->make(Generator::class);
    }
}
