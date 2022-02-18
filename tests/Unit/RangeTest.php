<?php

namespace ContractualObligations\Tests\Unit;

use ContractualObligations\Range;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    /** @test */
    public function it_returns_the_current_value_of_the_range()
    {
        $range = new Range(5,10);

        $this->assertEquals(5, $range->current());
    }

    /**
     * @test
     * @depends it_returns_the_current_value_of_the_range
     */
    public function it_moves_to_the_next_value_of_the_range()
    {
        $range = new Range(5, 10);
        $range->next();

        $this->assertEquals(6, $range->current());
    }

    /**
     * @test
     * @depends it_moves_to_the_next_value_of_the_range
     */
    public function it_returns_the_key_value_of_the_current_index()
    {
        $range = new Range(5,10);

        $this->assertEquals(0, $range->key());

        $range->next();

        $this->assertEquals(1, $range->key());
    }

    /** @test */
    public function it_returns_true_when_the_range_has_not_been_exhausted()
    {
        $range = new Range(5, 10);

        $this->assertTrue($range->valid());
    }

    /**
     * @test
     * @depends it_moves_to_the_next_value_of_the_range
     */
    public function it_returns_false_when_the_range_has_been_exhausted()
    {
        $range = new Range(1,2);

        $range->next();

        $this->assertFalse($range->valid());
    }

    /**
     * @test
     * @depends it_moves_to_the_next_value_of_the_range
     */
    public function it_can_rewind_to_the_start_of_the_range()
    {
        $range = new Range(5, 10);
        $range->next();

        $range->rewind();

        $this->assertEquals(5, $range->current());
    }

    /**
     * @test
     * @depends it_returns_false_when_the_range_has_been_exhausted
     */
    public function it_can_be_iterated_over()
    {
        $range = new Range(1, 3);

        $actual = [];
        foreach ($range as $index => $value) {
            $actual[$index] = $value;
        }

        $this->assertEquals([0 => 1, 1 => 2], $actual);
    }

    /** @test */
    public function it_returns_the_size_of_the_range()
    {
        $range = new Range(5, 10);

        $this->assertEquals(5, count($range));
    }
}
