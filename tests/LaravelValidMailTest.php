<?php

namespace Ayim\LaravelValidMail\Tests;

use Ayim\LaravelValidMail\Facades\ValidMail;

class LaravelValidMailTest extends TestCase
{
    public function getPackageProviders($app)
    {
        return parent::getPackageProviders($app); // TODO: Change the autogenerated stub
    }

    public function getPackageAliases($app)
    {
        return parent::getPackageAliases($app); // TODO: Change the autogenerated stub
    }

    public function test_validator()
    {
        $loop = 10;
        $response = ValidMail::validate($this->getEmail());
    }

    private function getEmail()
    {
        $faker = \Faker\Factory::create();

        switch (rand(1,6)) {
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
        };
        return $email;

    }
}