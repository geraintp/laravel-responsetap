<?php

namespace Tests;

use Geraintp\LaravelResponseTap\ServiceProvider;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as OrchTestCase;

abstract class TestCase extends OrchTestCase
{
    /**
     * Load our ServiceProvider.
     */
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    /**
     * Loads in our package .env file.
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);
    }
}
