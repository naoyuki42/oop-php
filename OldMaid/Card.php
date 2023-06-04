<?php

namespace OldMaid;

class Card {
    const JOKER = 0;
    const SPADE = 1;
    const DIAMOND = 2;
    const CLUB = 3;
    const HEART = 4;

    private int $suit;
    private int $number;

    public function __construct(int $suit, int $number) {
        $this->suit = $suit;
        $this->number = $number;
    }

    public function getNumber(): int {
        return $this->number;
    }

    public function toString(): string {
        if ($this->suit === 0) {
            return "JK";
        } else {
            $suit_array = [
                self::SPADE => "S",
                self::DIAMOND => "D",
                self::CLUB => "C",
                self::HEART => "H",
            ];
            $number_array = [
                1 => "A",
                2 => "2",
                3 => "3",
                4 => "4",
                5 => "5",
                6 => "6",
                7 => "7",
                8 => "8",
                9 => "9",
                10 => "T",
                11 => "J",
                12 => "Q",
                13 => "K",
            ];
            $card = $suit_array[$this->suit] . $number_array[$this->number];
            return $card;
        }
    }
}