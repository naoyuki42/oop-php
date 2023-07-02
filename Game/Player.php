<?php

namespace Game;

use Game\Interface\PlayerInterface;

class Player implements PlayerInterface
{
    public function __construct(
        private string $name,
        private array $hands,
    ) {}

    public function getHand(): string
    {
        $index = array_rand($this->hands, 1);
        return $this->hands[$index];
    }

    public function getName(): string
    {
        return $this->name;
    }
}