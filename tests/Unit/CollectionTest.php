<?php

namespace ContractualObligations\Tests\Unit;

use ContractualObligations\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /** @test */
    public function it_can_get_a_value_at_a_given_offset()
    {
        $collection = new Collection([
            'first' => 'foo',
            'second' => 'bar',
            'third' => 'baz'
        ]);

        $this->assertEquals('bar', $collection['second']);
    }

    /** @test */
    public function it_throws_an_exception_when_accessing_an_offset_that_doesnt_exist()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Undefined offset: not_there' );
        $collection = new Collection();

        $collection['not_there'];
    }

    /**
     * @test
     * @depends it_can_get_a_value_at_a_given_offset
     */
    public function it_can_set_a_value_at_a_given_offset()
    {
        $collection = new Collection();
        $collection['first'] = 'foo';

        $this->assertEquals('foo', $collection['first']);
    }

    /**
     * @test
     * @depends it_can_set_a_value_at_a_given_offset
     */
    public function it_can_assert_an_offset_is_set()
    {
        $collection = new Collection();
        $collection['first'] = 'foo';

        $this->assertTrue(isset($collection['first']));
        $this->assertFalse(isset($collection['not-there']));
    }

    /**
     * @test
     * @depends it_can_assert_an_offset_is_set
     */
    public function it_can_unset_an_offset()
    {
        $collection = new Collection();
        $collection['first'] = 'foo';

        unset($collection['first']);

        $this->assertFalse(isset($collection['first']));
    }
}
