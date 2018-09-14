<?php
/**
 * Created by IntelliJ IDEA.
 * User: ayim
 * Date: 9/14/18
 * Time: 11:16 AM.
 */

namespace Ayim\LaravelValidMail\Tests;

use Ayim\LaravelValidMail\LaravelValidMailService;
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

    /**
     *
     */
    public function test_validator()
    {
        $loop = 10;

        for ($i = 0; $i <= $loop; $i++) {
            $validator = new LaravelValidMailService();
            $response = $validator->validate($this->getEmail());
            //Test response status code
            $this->assertEquals(200, $response->status);
            //Test response
            $this->assertObjectHasAttribute('status', $response);
            $this->assertObjectHasAttribute('isValid', $response);
        }
    }

    private function getEmail()
    {
        $faker = \Faker\Factory::create();

        switch (rand(1, 6)) {
            case 1:
                $email = $faker->email;
                break;
            case 2:
                $email = $faker->safeEmail;
                break;
            case 3:
            default:
                $email = $faker->freeEmail;
                break;
        }

        return $email;
    }
}
