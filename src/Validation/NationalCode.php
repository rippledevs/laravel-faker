<?php

namespace RippleDevs\LaravelFaker\Validation;

class NationalCode
{
    /**
     * Check Iranian National Code validity.
     *
     * @param $code
     * @return bool
     */
    public static function isValid($code): bool
    {
        if (!preg_match('/^\d{10}$/', $code)) {
            return false;
        }

        if (preg_match('/^(\\d)\\1{9}$/', $code)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += intval($code[$i]) * (10 - $i);
        }

        $remainder = $sum % 11;
        $control = intval($code[9]);

        if ($remainder < 2) {
            return $control === $remainder;
        } else {
            return $control === (11 - $remainder);
        }
    }
}
