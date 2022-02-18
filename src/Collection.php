<?php

namespace ContractualObligations;

class Collection implements \ArrayAccess
{
    public function __construct(private array $base = [])
    {
    }

    public function offsetExists(mixed $key): bool
    {
        return array_key_exists($key, $this->base);
    }

    public function offsetGet(mixed $key): mixed
    {
        if (! array_key_exists($key, $this->base)) {
            throw new \RuntimeException('Undefined offset: ' . $key);
        }

        return $this->base[$key];
    }

    public function offsetSet(mixed $key, mixed $value): void
    {
        $this->base[$key] = $value;
    }

    public function offsetUnset(mixed $key): void
    {
        unset($this->base[$key]);
    }
}
