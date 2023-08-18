<?php

namespace Prototype;

use Exception;

class ItemManager
{
    public function __construct(
        private array $items = [],
    ) {}

    public function registerItem(ItemPrototype $item): void
    {
        $this->items[] = $item;
    }

    public function create(string $item_code): ItemPrototype
    {
        if (!array_key_exists($item_code, $this->items)) {
            throw new Exception("item_code [" . $item_code . '] not exists !');
        }
        return $this->items[$item_code]->newInstance();
    }
}