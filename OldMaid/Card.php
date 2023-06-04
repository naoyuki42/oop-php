<?php

namespace OldMaid;

class Card {
    private string $suit;
    private int $number;

    public function __construct(string $suit, int $number) {
        $this->suit = $suit;
        $this->number = $number;
    }

    public function getNumber(): int {
        return $this->number;
    }

    public function showCard(): string {
        $string = $this->suit;
        switch ($this->number) {
            case 1;
                $string .= "A";
                break;
            case 11;
                $string .= "J";
                break;
            case 12;
                $string .= "Q";
                break;
            case 13;
                $string .= "K";
                break;
            default:
                $string .= strval($this->number);
                break;
        }
        return $string;
    }
}