<?php

namespace TrumpGame;

class Joker extends Card {
    public function __construct() {
        parent::__construct(0, 0);
    }

    public function setNumber(int $number): void {
        $this->number = $number;
    }

    public function setSuit(int $suit): void {
        $this->suit = $suit;
    }

    public function getCard(): string {
        return "JK";
    }
}