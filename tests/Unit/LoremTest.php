<?php

namespace RippleDevs\LaravelFaker\Tests\Unit;

use RippleDevs\LaravelFaker\Tests\PersianTestCase;
use RippleDevs\LaravelFaker\Validation\Sheba;

class LoremTest extends PersianTestCase
{
    /**
     * @return void
     */
    public function test_sentence_is_not_empty()
    {
        $sentence = $this->faker->sentence();
        $this->assertNotEmpty($sentence);
    }

    /**
     * @return void
     */
    public function test_paragraph_is_not_empty()
    {
        $paragraph = $this->faker->paragraph();
        $this->assertNotEmpty($paragraph);
    }

    /**
     * @return void
     */
    public function test_paragraphs_is_not_empty()
    {
        $paragraphs = $this->faker->paragraphs();
        $this->assertNotEmpty($paragraphs);
    }

    /**
     * @return void
     */
    public function test_paragraphs_return_multi_paragraphs_text()
    {
        $paragraphs = $this->faker->paragraphs(5);
        $this->assertGreaterThan(1, substr_count($paragraphs, PHP_EOL));
    }

    /**
     * @return void
     */
    public function test_paragraphs_result_is_string()
    {
        $paragraphs = $this->faker->paragraphs(5);
        $this->assertIsString($paragraphs);
    }
}
