<?php

namespace RippleDevs\LaravelFaker\Faker;

use Faker\Provider\Base;
use RippleDevs\LaravelFaker\Generator\NationalCode;

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
}
