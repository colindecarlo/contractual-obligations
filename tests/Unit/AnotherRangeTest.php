<?php

namespace ContractualObligations\Tests\Unit;

use ContractualObligations\AnotherRange;
use PHPUnit\Framework\TestCase;

class AnotherRangeTest extends TestCase
{
    /** @test */
    public function it_can_be_iterated_over()
    {
        $range = new AnotherRange(1, 3);

        $actual = [];
        foreach ($range as $index => $value) {
            $actual[$index] = $value;
        }

        $this->assertEquals([0 => 1, 1 => 2], $actual);
    }
}
