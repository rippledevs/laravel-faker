<?php

namespace RippleDevs\LaravelFaker\Generator;

class BankCardNumber
{
    /**
     * Generate a valid Iranian Bank Card Number.
     *
     * @return string
     */
    public static function generate(): string
    {
        $bins = [
            '603799',
            '589210',
            '627648',
            '627961',
            '603770',
            '628023',
            '627760',
            '502908',
            '627412',
            '622106',
            '502229',
            '627488',
            '621986',
            '639346',
            '639607',
            '636214',
        ];

        $cardNumber = $bins[array_rand($bins)];

        while (strlen($cardNumber) < 15) {
            $cardNumber .= rand(0, 9);
        }

        $sum = 0;
        for ($i = 0; $i < 15; $i++) {
            $digit = (int)$cardNumber[$i];

            if ($i % 2 === 0) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
        }

        $checkDigit = (10 - ($sum % 10)) % 10;

        return $cardNumber . $checkDigit;
    }
}
