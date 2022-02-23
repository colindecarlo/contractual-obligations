<?php

namespace ContractualObligations;

class DBModel
{
    private static $records = [
        '42' => ['id' => 42, 'name' => 'Colin'],
        '1337' => ['id' => 1337, 'name' => 'Angela'],
    ];

    public function __construct(private array $attributes)
    {
    }

    public static function byId(int $id)
    {
        return new static(static::$records[$id]);
    }

    public function toArray(): array
    {
        return $this->attributes;
    }
}
