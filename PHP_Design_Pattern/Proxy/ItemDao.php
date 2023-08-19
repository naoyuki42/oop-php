<?php

namespace Proxy;

interface ItemDao
{
    public function findById(int $item_id): Item;
}