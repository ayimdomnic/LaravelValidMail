<?php
/**
 * Created by IntelliJ IDEA.
 * User: ayim
 * Date: 9/14/18
 * Time: 11:16 AM.
 */

namespace Ayim\LaravelValidMail\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * Load package service provider.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['Ayim\LaravelValidMail\LaravelValidMailServiceProvider'];
    }

    /**
     * Load package alias.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'ValidMail' => 'Ayim\LaravelValidMail\Facades\ValidMail',
        ];
    }
}
