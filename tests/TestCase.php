<?php

namespace Laravel\Aws\Tests;

use Laravel\Aws\AwsServiceProvider;
use Orchestra\Testbench\TestCase as Testbench;

class TestCase extends Testbench
{
    /**
     * Setup the test environment.
     *
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();

        //
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        //
    }

    /**
     * Get Laraplans package service provider.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    public function getPackageProviders($app)
    {
        return [
            AwsServiceProvider::class,
        ];
    }
}
