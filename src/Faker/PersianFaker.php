<?php

namespace RippleDevs\LaravelFaker\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use RippleDevs\LaravelFaker\Generator\BankCardNumber;
use RippleDevs\LaravelFaker\Generator\NationalCode;
use RippleDevs\LaravelFaker\Generator\PostalCode;
use RippleDevs\LaravelFaker\Generator\Sheba;
use RippleDevs\LaravelFaker\Validation\PostalCode as PostalCodeValidation;

class PersianFaker extends Base
{
    private static array $words = [];

    /**
     * Generate a random Persian word.
     *
     * @return mixed
     */
    public function word(): mixed
    {
        $this->_loadWords();
        return Arr::random(self::$words);
    }

    /**
     * Generate an array of random Persian words.
     *
     * @param int $nb
     * @return array
     */
    public function words(int $nb = 3): array
    {
        $this->_loadWords();
        return Arr::random(self::$words, $nb);
    }

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

    /**
     * Load persian words from the JSON file.
     *
     * @return void
     */
    private function _loadWords(): void
    {
        self::$words = json_decode(file_get_contents(__DIR__ . '/../../resources/words.json'), true);
    }
}
