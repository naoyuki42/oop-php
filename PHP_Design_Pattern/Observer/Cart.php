<?php

namespace Observer;

class Cart
{
    private array $items = [];
    private array $listeners = [];

    public function addItem(string $item_cd): void
    {
        $this->items[$item_cd] = (isset($this->items[$item_cd])) ? ++$this->items[$item_cd] : 1;
        $this->notify();
    }

    public function removeItem(string $item_cd): void
    {
        $this->items[$item_cd] = (isset($this->items[$item_cd])) ? --$this->items[$item_cd] : 0;
        if ($this->items[$item_cd] <= 0) {
            unset($this->items[$item_cd]);
        }
        $this->notify();
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function hasItem(string $item_cd): bool
    {
        return array_key_exists($item_cd, $this->items);
    }

    public function addListener(CartListener $listener): void
    {
        $this->listeners[get_class($listener)] = $listener;
    }

    public function removeListener(CartListener $listener): void
    {
        unset($this->listeners[get_class($listener)]);
    }

    public function notify(): void
    {
        foreach ($this->listeners as $listener) {
            $listener->update($this);
        }
    }
}