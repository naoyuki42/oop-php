<?php

namespace Proxy;

class MockItemDao implements ItemDao
{
    public function findById(int $item_id): Item
    {
        return new Item($item_id, "ダミー");
    }
}