<?php

namespace RippleDevs\LaravelFaker\Tests\Unit;

use RippleDevs\LaravelFaker\Tests\TestCase;
use RippleDevs\LaravelFaker\Validation\NationalCode;
use RippleDevs\LaravelFaker\Validation\PostalCode;
use RippleDevs\LaravelFaker\Validation\Sheba;

class PostalCodeTest extends TestCase
{
    /**
     * @return void
     */
    public function test_generated_postal_code_is_valid()
    {
        $postalCode = $this->faker->postalCode();

        $this->assertTrue(
            PostalCode::check($postalCode),
            'Generated postal code should be valid'
        );
    }

    /**
     * @return void
     */
    public function test_postal_code_has_ten_digits()
    {
        $postalCode = $this->faker->postalCode();

        $this->assertSame(10, strlen($postalCode));
    }

    /**
     * @return void
     */
    public function test_postal_code_contains_only_digits()
    {
        $postalCode = $this->faker->postalCode();

        $this->assertMatchesRegularExpression('/^\d{10}$/', $postalCode);
    }

    /**
     * @return void
     */
    public function test_postal_code_is_not_all_identical_digits()
    {
        $postalCode = $this->faker->postalCode();

        $this->assertDoesNotMatchRegularExpression(
            '/^(\d)\1{9}$/',
            $postalCode,
            'Postal code should not contain identical digits'
        );
    }

    /**
     * @return void
     */
    public function test_invalid_postal_code_fails_validation()
    {
        $invalidCodes = [
            '123456789',
            '12345678901',
            '1111111111',
            'ABCDEFGHIJ',
        ];

        foreach ($invalidCodes as $code) {
            $this->assertFalse(
                PostalCode::check($code),
                "Postal code [$code] should be invalid"
            );
        }
    }

    /**
     * @return void
     */
    public function test_multiple_generated_postal_codes_are_not_all_identical()
    {
        $codes = [];

        for ($i = 0; $i < 10; $i++) {
            $codes[] = $this->faker->postalCode();
        }

        $this->assertGreaterThan(
            1,
            count(array_unique($codes)),
            'Generated postal codes should not all be identical'
        );
    }
}
