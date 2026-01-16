<?php

namespace RippleDevs\LaravelFaker\Tests\Unit;

use RippleDevs\LaravelFaker\Tests\PersianTestCase;
use RippleDevs\LaravelFaker\Validation\BankCardNumber;

class BankCardNumberTest extends PersianTestCase
{
    /**
     * @return void
     */
    public function test_generated_bank_card_is_valid()
    {
        $cardNumber = $this->faker->bankCardNumber();

        $this->assertTrue(
            BankCardNumber::isValid($cardNumber),
            'Generated bank card number should be valid'
        );
    }

    /**
     * @return void
     */
    public function test_bank_card_has_sixteen_digits()
    {
        $cardNumber = $this->faker->bankCardNumber();

        $this->assertSame(16, strlen($cardNumber));
    }

    /**
     * @return void
     */
    public function test_bank_card_contains_only_digits()
    {
        $cardNumber = $this->faker->bankCardNumber();

        $this->assertMatchesRegularExpression('/^\d{16}$/', $cardNumber);
    }

    /**
     * @return void
     */
    public function test_invalid_bank_card_fails_validation()
    {
        $invalidCards = [
            '1234567890123456',
            '1111111111111111',
            '6037991234567890',
            'ABCDEFGHIJKLMNO1',
            '123',
        ];

        foreach ($invalidCards as $card) {
            $this->assertFalse(
                BankCardNumber::isValid($card),
                "Bank card [$card] should be invalid"
            );
        }
    }

    /**
     * @return void
     */
    public function test_multiple_generated_cards_are_not_all_identical()
    {
        $cards = [];

        for ($i = 0; $i < 10; $i++) {
            $cards[] = $this->faker->bankCardNumber();
        }

        $this->assertGreaterThan(
            1,
            count(array_unique($cards)),
            'Generated bank cards should not all be identical'
        );
    }
}
