<?php

namespace ContractualObligations;

use ArrayIterator;
use Traversable;

class AnotherRange implements \IteratorAggregate
{

    public function __construct(private int $start, private int $end)
    {
    }


    public function getIterator(): Traversable
    {
        return new ArrayIterator(range($this->start, $this->end - 1));
    }
}
