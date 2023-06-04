<?php

namespace OldMaid;

class Table
{
    private array $disposedCards = [];

    public function putCard($card): void {
        array_push($this->disposedCards, $card);
        printf("{$card->toString()}を捨てました\n");
    }

    public function toString(): string {
        $disposedCardsString = "";
        foreach ($this->disposedCards as $card) {
            $disposedCardsString .= $card->toString() . " ";
        }
        return $disposedCardsString;
    }
}