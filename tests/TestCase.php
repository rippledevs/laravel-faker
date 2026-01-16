<?php

namespace RippleDevs\LaravelFaker\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as Orchestra;
use RippleDevs\LaravelFaker\Providers\LaravelFakerServiceProvider;

class TestCase extends Orchestra
{
    use WithFaker;

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
}
