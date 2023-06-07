<?php

namespace Fantan;

use TrumpGame\Table;
use TrumpGame\Cards;

class FantanTable implements Table {
    private array $table = [
        "SPADE" => [
            1 => "..",
            2 => "..",
            3 => "..",
            4 => "..",
            5 => "..",
            6 => "..",
            7 => "..",
            8 => "..",
            9 => "..",
            10 => "..",
            11 => "..",
            12 => "..",
            13 => "..",
        ],
        "DIAMOND" => [
            1 => "..",
            2 => "..",
            3 => "..",
            4 => "..",
            5 => "..",
            6 => "..",
            7 => "..",
            8 => "..",
            9 => "..",
            10 => "..",
            11 => "..",
            12 => "..",
            13 => "..",
        ],
        "CLUB" => [
            1 => "..",
            2 => "..",
            3 => "..",
            4 => "..",
            5 => "..",
            6 => "..",
            7 => "..",
            8 => "..",
            9 => "..",
            10 => "..",
            11 => "..",
            12 => "..",
            13 => "..",
        ],
        "HEART" => [
            1 => "..",
            2 => "..",
            3 => "..",
            4 => "..",
            5 => "..",
            6 => "..",
            7 => "..",
            8 => "..",
            9 => "..",
            10 => "..",
            11 => "..",
            12 => "..",
            13 => "..",
        ]
    ];

    public function putCard(Card $card): void {
        $number = $card->getNumber();
        $suit = $card->getSuit();
        $this->table[$suit][$number] = $this->card->toString();
    }

    public function getCards(): array {
        $returnTable = $this->table;
        return $returnTable;
    }

    public function toString(): string {
        $string = "";
        foreach ($this->table as $suit_cards) {
            foreach ($suit_cards as $card) {
                $string .= $card->toString() . " ";
            }
            $string .= "\n";
        }
        return $string;
    }
}