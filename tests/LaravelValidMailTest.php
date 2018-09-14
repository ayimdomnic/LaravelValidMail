<?php

namespace Ayim\LaravelValidMail\Tests;

use Ayim\LaravelValidMail\LaravelValidMailService;

class LaravelValidMailTest
{

    protected $validator;

    public function __construct(LaravelValidMailService $validator)
    {
        $this->validator = $validator;
    }

    public function test_validator()
    {
        $loop = 10;

        for ($i = 0; $i <= $loop; $i++) {
            $response = $this->validator->validate($this->getEmail());
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
