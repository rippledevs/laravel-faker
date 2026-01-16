<?php

namespace RippleDevs\LaravelFaker\Generator;

class Sheba
{
    /**
     * Generate a valid Iranian IBAN (Shaba).
     *
     * @return string
     */
    public static function generate(): string
    {
        $countryCode = 'IR';

        $bban = '';
        for ($i = 0; $i < 22; $i++) {
            $bban .= rand(0, 9);
        }

        $iban = $countryCode . '00' . $bban;

        $rearranged = substr($iban, 4) . substr($iban, 0, 4);

        // Step 3: Convert letters to numbers (A=10 ... Z=35)
        $numeric = '';
        foreach (str_split($rearranged) as $char) {
            if (ctype_digit($char)) {
                $numeric .= $char;
            } else {
                $numeric .= ord($char) - 55;
            }
        }

        $mod = 0;
        for ($i = 0, $len = strlen($numeric); $i < $len; $i++) {
            $mod = ($mod * 10 + (int) $numeric[$i]) % 97;
        }

        $checkDigits = str_pad((98 - $mod), 2, '0', STR_PAD_LEFT);

        return $countryCode . $checkDigits . $bban;
    }
}
