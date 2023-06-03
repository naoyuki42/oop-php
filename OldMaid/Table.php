<?php

namespace OldMaid;

class Table {
    private array $disposedCards = [];

    public function disposedCard(array $cards): void {
        $string = "";
        foreach ($cards as $card) {
            $string . $card->toString() . " ";
        }
        printf("{$string}を捨てました\n");
        array_concat($this->disposedCards, $cards);
    }
}