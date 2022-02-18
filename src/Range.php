<?php

namespace ContractualObligations;

use JetBrains\PhpStorm\Internal\TentativeType;

class Range implements \Iterator
{
    private $current;

    public function __construct(private int $start, private int $end)
    {
        $this->current = $start;
    }

    public function current(): mixed
    {
        return $this->current;
    }

    public function next(): void
    {
        $this->current += 1;
    }

    public function key(): mixed
    {
        return $this->current - $this->start;
    }

    public function valid(): bool
    {
        return $this->current < $this->end;
    }

    public function rewind(): void
    {
        $this->current = $this->start;
    }
}
