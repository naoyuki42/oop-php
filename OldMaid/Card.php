<?php

namespace OldMaid;

class Card {
    public static int $JOKER = 0;
    public static int $SPADE = 1;
    public static int $DIAMOND = 2;
    public static int $CLUB = 3;
    public static int $HEART = 4;

    private int $suit;
    private int $number;

    public function __construct(int $suit, int $number) {
        $this->suit = $suit;
        $this->number = $number;
    }

    public function getNumber(): int {
        return $number;
    }

    public function toString(): string {
        $string = "";

        if ($this->number === 0) {
            return $string .= "JK";
        }

        switch ($this->suit) {
            case $this->SPADE:
                $string .= "S";
                break;
            case $this->DIAMOND:
                $string .= "D";
                break;
            case $this->CLUB:
                $string .= "C";
                break;
            case $this->HEART:
                $string .= "H";
                break;
            default:
                break;
        }
        switch ($this->number) {
            case 1:
                $string . "A";
                break;
            case 11:
                $string . "J";
                break;
            case 12:
                $string . "Q";
                break;
            case 13:
                $string . "K";
                break;
            default:
                $string . strval($this->number);
                break;
        }
        return $string;
    }
}