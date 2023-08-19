<?php

namespace Proxy;

class DbItemDao implements ItemDao
{
    public function findById(int $item_id): Item
    {
        return new Item($item_id, "ぬいぐるみ");
    }
}