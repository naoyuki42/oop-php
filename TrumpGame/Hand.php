<?php

namespace TrumpGame;

class Hand {
    public array $hand = [];

    public function addCard(Card $card): void {
        array_push($this->hand, $card);
    }

    public function lookCard(int $position): Card | null {
        $lookingCard = null;
        if ((0 <= $position) && ($position < count($this->hand))) {
            $lookingCard = $this->hand[$position];
        }
        return $lookingCard;
    }

    public function pickCard(int $position): Card | null {
        $pickCard = null;
        if ((0 <= $position) && ($position < count($this->hand))) {
            $pickCard = $this->hand[$position];
            array_splice($this->hand, $position, 1);
        }
        return $pickCard;
    }

    public function shuffle(): void {
        shuffle($this->hand);
    }

    public function getNumberOfCards(): int {
        return count($this->hand);
    }

    public function toString(): string {
        $string = "";
        if (0 < count($this->hand)) {
            foreach($this->hand as $card) {
                $string .= $card->toString() . " ";
            }
            $string .= "\n";
        }
        return $string;
    }
}