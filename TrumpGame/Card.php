<?php

namespace TrumpGame;

class Card {
    const SPADE = 1;
    const DIAMOND = 2;
    const CLUB = 3;
    const HEART = 4;
    const SUIT_NUM = 4;
    const CARD_NUM = 13;

    protected int $suit;
    protected int $number;

    public function __construct(int $suit, int $number) {
        $this->suit = $suit;
        $this->number = $number;
    }

    public function getNumber(): int {
        return $this->number;
    }

    public function getSuit(): int {
        return $this->suit;
    }

    public function toString(): string {
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
        return $suit_array[$this->suit] . $number_array[$this->number];
    }
}