<?php

namespace RippleDevs\LaravelFaker\Generator;

class NationalCode
{
    /**
     * Generate a valid Iranian National Code.
     *
     * @return string
     */
    public static function generate(): string
    {
        $digits = [];
        for ($i = 0; $i < 9; $i++) {
            $digits[] = rand(0, 9);
        }

        $sum = 0;
        foreach ($digits as $i => $digit) {
            $sum += $digit * (10 - $i);
        }

        $remainder = $sum % 11;
        $control = $remainder < 2 ? $remainder : 11 - $remainder;

        return implode('', $digits) . $control;
    }

}
