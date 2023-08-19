<?php

namespace Proxy;

class ItemDaoProxy
{
    public function __construct(
        private ItemDao $dao,
        private array $cache = [],
    ) {}

    public function findById(int $item_id): Item
    {
        if (array_key_exists($item_id, $this->cache)) {
            return $this->cache[$item_id];
        }
        $this->cache[$item_id] = $this->dao->findById($item_id);
        return $this->cache[$item_id];
    }
}