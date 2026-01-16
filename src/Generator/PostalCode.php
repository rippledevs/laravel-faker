<?php

namespace RippleDevs\LaravelFaker\Generator;

class PostalCode
{
    /**
     * Generate a random Iranian Postal Code.
     *
     * @return string
     */
    public static function generate(): string
    {
        $code = (string) rand(1, 9);

        // 9 رقم بعدی
        for ($i = 0; $i < 9; $i++) {
            $code .= rand(0, 9);
        }

        return $code;
    }
}
