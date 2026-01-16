<?php

namespace RippleDevs\LaravelFaker\Faker;

use Faker\Provider\Base;
use RippleDevs\LaravelFaker\Generator\BankCardNumber;
use RippleDevs\LaravelFaker\Generator\NationalCode;
use RippleDevs\LaravelFaker\Generator\PostalCode;
use RippleDevs\LaravelFaker\Generator\Sheba;
use RippleDevs\LaravelFaker\Validation\PostalCode as PostalCodeValidation;

class PersianFaker extends Base
{
    /**
     * Generate a random Iranian Bank Card Number.
     *
     * @return string
     */
    public function bankCardNumber(): string
    {
        return BankCardNumber::generate();
    }

    /**
     * Generate a random Iranian Postal Code.
     *
     * @return string
     */
    public function postalCode(): string
    {
        do {
            $postalCode = PostalCode::generate();
        } while (!PostalCodeValidation::check($postalCode));
        return $postalCode;
    }

    /**
     * Generate a valid Iranian National Code.
     *
     * @return string
     */
    public function nationalCode(): string
    {
        return NationalCode::generate();
    }

    /**
     * Generate a valid Iranian IBAN (Shaba).
     *
     * @return string
     */
    public function sheba(): string
    {
        return Sheba::generate();
    }
}
