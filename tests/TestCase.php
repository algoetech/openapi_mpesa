<?php

namespace Algoetech\OpenapiMpesa\Tests;

use Algoetech\OpenapiMpesa\AlgoetechOpenApiMPesaServiceProvider as AETProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            AETProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}