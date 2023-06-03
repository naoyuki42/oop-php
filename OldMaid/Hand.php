<?php

namespace OldMaid;

class Hand {
    private array $hand = [];

    public function addCard(Card $card): void {
        array_push($this->hand, $card);
    }

    public function pickCard(): Card {
        return array_shift($this->hand);
    }

    public function shuffle(): void {
        shuffle($this->hand);
    }

    public function getNumberOfCards(): int {
        return count($this->hand);
    }

    public function findSameNumberCard(): array {
        $numberOfCards = count($this->hand);
        $sameCards = null;

        if ($numberOfCards === 0) {
            return $sameCards;
        }

        $lastIndex = $numberOfCards - 1;
        $lastAddedCard = $this->hand[$lastIndex];
        $lastAddedCardNumber = $lastAddedCard->getNumber();

        for ($i = 0; $i < $lastIndex; $i++) {
            $card = $this->hand[$i];
            if ($card->getNumber() === $lastAddedCardNumber) {
                $sameCards[0] = array_pop($this->hand);
                $sameCards[1] = array_splice($this->hand, $i, 1);
            }
        }
        return $sameCards;
    }

    public function toString(): string {
        $string = "";
        foreach ($this->hand as $card) {
            $string . $card->toString() . " ";
        }
        return $string;
    }
}