<?php

namespace OldMaid;

class Table {
    private array $disposedCards = [];

    public function disposeCard(Card $card): void {
        $string = $card->showCard();
        printf("{$string}を捨てました\n");
        array_push($this->disposedCards, $card);
    }
}