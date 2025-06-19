<?php

namespace Joinbiz\BizApp\Tests;

use Joinbiz\BizApp\BizAppServiceProvider;
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
            BizAppServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_joinbiz-plugin_table.php.stub';
        $migration->up();
        */
    }
}
