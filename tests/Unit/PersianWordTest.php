<?php

namespace RippleDevs\LaravelFaker\Tests\Unit;

use RippleDevs\LaravelFaker\Tests\TestCase;

class PersianWordTest extends TestCase
{
    /**
     * @return void
     */
    public function test_word_is_not_empty()
    {
        $word = $this->faker->word();
        $this->assertNotEmpty($word, 'The generated Persian word should not be empty.');
    }

    /**
     * @return void
     */
    public function test_words_is_not_a_empty_array()
    {
        $words = $this->faker->words();
        $this->assertNotEmpty($words, 'The generated array of Persian words should not be empty.');
        $this->assertGreaterThan(0, count($words), 'The generated array of Persian words should not be empty.');
    }

    /**
     * @return void
     */
    public function test_words_method_returns_given_number_of_words()
    {
        $words = $this->faker->words(5);
        $this->assertCount(5, $words, 'The generated array should contain exactly 5 words.');
    }
}
