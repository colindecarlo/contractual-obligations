<?php

namespace ContractualObligations;

class DBModel implements \Serializable, \JsonSerializable
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

    public function serialize()
    {
        return serialize($this->__serialize());
    }

    public function unserialize(string $data)
    {
        $this->__unserialize(unserialize($data));
    }

    public function __serialize(): array
    {
        return ['id' => $this->attributes['id']];
    }

    public function __unserialize(array $data): void
    {
        $this->attributes = static::$records[$data['id']];
    }

    public function jsonSerialize(): array
    {
        return $this->attributes;
    }
}
