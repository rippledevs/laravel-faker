<?php

namespace RippleDevs\LaravelFaker\Validation;

class PostalCode
{
    /**
     * Check Iranian Postal Code validity.
     *
     * @param string $postalCode
     * @return bool
     */
    public static function check(string $postalCode): bool
    {
        if (!preg_match('/^\d{10}$/', $postalCode)) {
            return false;
        }

        if (preg_match('/^(\d)\1{9}$/', $postalCode)) {
            return false;
        }

        return true;
    }
}
