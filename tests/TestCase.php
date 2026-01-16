<?php

namespace RippleDevs\LaravelFaker\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RippleDevs\LaravelFaker\Providers\LaravelFakerServiceProvider;

class TestCase extends Orchestra
{
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
