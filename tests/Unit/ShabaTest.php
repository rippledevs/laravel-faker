<?php

namespace RippleDevs\LaravelFaker\Tests\Unit;

use RippleDevs\LaravelFaker\Tests\PersianTestCase;
use RippleDevs\LaravelFaker\Validation\Sheba;

class ShabaTest extends PersianTestCase
{
    /**
     * @return void
     */
    public function test_generated_sheba_is_valid()
    {
        $sheba = $this->faker->sheba();

        $this->assertTrue(
            Sheba::isValid($sheba),
            'Generated Sheba should be valid'
        );
    }

    /**
     * @return void
     */
    public function test_generated_sheba_has_correct_length()
    {
        $sheba = $this->faker->sheba();

        $this->assertSame(26, strlen($sheba));
    }

    /**
     * @return void
     */
    public function test_generated_sheba_starts_with_ir()
    {
        $sheba = $this->faker->sheba();

        $this->assertStringStartsWith('IR', $sheba);
    }

    /**
     * @return void
     */
    public function test_invalid_sheba_fails_validation()
    {
        $invalidSheba = 'IR000000000000000000000000';

        $this->assertFalse(
            Sheba::isValid($invalidSheba)
        );
    }

    /**
     * @return void
     */
    public function test_multiple_generated_shebas_are_not_all_identical()
    {
        $shebas = [];

        for ($i = 0; $i < 10; $i++) {
            $shebas[] = $this->faker->sheba();;
        }

        $this->assertGreaterThan(
            1,
            count(array_unique($shebas)),
            'Generated Shebas should not all be identical'
        );
    }
}
