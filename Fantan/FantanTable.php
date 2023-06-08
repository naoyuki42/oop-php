<?php

namespace Fantan;

use TrumpGame\Table;
use TrumpGame\Card;

class FantanTable implements Table {
    private array $table = [
        1 => [
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
        2 => [
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
        3 => [
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
        4 => [
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
        $this->table[$suit][$number] = $card->toString();
    }

    public function getCards(): array {
        $returnTable = $this->table;
        return $returnTable;
    }

    public function toString(): string {
        $string = "";
        foreach ($this->table as $suit_cards) {
            foreach ($suit_cards as $card) {
                $string .= ($card === "..") ? "..": $card;
                $string .= " ";
            }
            $string .= "\n";
        }
        return $string;
    }
}