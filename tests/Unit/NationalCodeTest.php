<?php

namespace RippleDevs\LaravelFaker\Tests\Unit;

use RippleDevs\LaravelFaker\Tests\TestCase;
use RippleDevs\LaravelFaker\Validation\NationalCode;

class NationalCodeTest extends TestCase
{
    /**
     * @return void
     */
    public function test_generated_national_code_length_is_ten()
    {
        $nationalCode = $this->faker->nationalCode();
        $this->assertEquals(10, strlen($nationalCode));
    }

    /**
     * @return void
     */
    public function test_generated_national_code_is_valid()
    {
        $nationalCode = $this->faker->nationalCode();
        $this->assertTrue(NationalCode::isValid($nationalCode));
    }

    /**
     * @return void
     */
    public function test_multiple_national_code_are_valid()
    {
        for ($i = 0; $i < 100; $i++) {
            $nationalCode = $this->faker->nationalCode();
            $this->assertTrue(NationalCode::isValid($nationalCode));
        }
    }
}
