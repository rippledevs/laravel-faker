<?php

namespace RippleDevs\LaravelFaker\Faker;

use Faker\Provider\Base;
use RippleDevs\LaravelFaker\Generator\NationalCode;
use RippleDevs\LaravelFaker\Generator\Sheba;

class PersianFaker extends Base
{
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
