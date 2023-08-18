<?php

namespace Prototype;

use stdClass;

abstract class ItemPrototype
{
    public function __construct(
        private string $item_code,
        private string $item_name,
        private int $price,
        private ?stdClass $detail = null,
    ) {}

    public function getCode(): string
    {
        return $this->item_code;
    }

    public function getName(): string
    {
        return $this->item_name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setDetail(stdClass $detail): void
    {
        $this->detail = $detail;
    }

    public function getDetail(): stdClass
    {
        return $this->detail;
    }

    public function newInstance(): ItemPrototype
    {
        return clone $this;
    }

    protected abstract function __clone(): void;
}