<?php

namespace RippleDevs\LaravelFaker\Validation;

class BankCardNumber
{
    /**
     * Check Bank Card Number validity using Luhn algorithm.
     *
     * @param string $cardNumber
     * @return bool
     */
    public static function isValid(string $cardNumber): bool
    {
        if (!preg_match('/^\d{16}$/', $cardNumber)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 16; $i++) {
            $digit = (int) $cardNumber[$i];

            if ($i % 2 === 0) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
        }

        return $sum % 10 === 0;
    }
}
