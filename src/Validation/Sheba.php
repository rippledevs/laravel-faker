<?php

namespace RippleDevs\LaravelFaker\Validation;

class Sheba
{
    /**
     * Check Iranian Sheba (IBAN) validity.
     *
     * @param string $sheba
     * @return bool
     */
    public static function isValid(string $sheba): bool
    {
        $sheba = strtoupper(str_replace(' ', '', $sheba));

        if (!preg_match('/^IR\d{24}$/', $sheba)) {
            return false;
        }

        $rearrangedSheba = substr($sheba, 4) . substr($sheba, 0, 4);

        $numericSheba = '';
        foreach (str_split($rearrangedSheba) as $char) {
            if (ctype_digit($char)) {
                $numericSheba .= $char;
            } else {
                $numericSheba .= ord($char) - 55;
            }
        }

        $mod = 0;
        $length = strlen($numericSheba);

        for ($i = 0; $i < $length; $i++) {
            $mod = ($mod * 10 + (int)$numericSheba[$i]) % 97;
        }

        return $mod === 1;
    }

}
