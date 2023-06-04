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

    public function getNumberOfCard(): int {
        return count($this->hand);
    }

    public function findSameNumberCard(): array | null {
        $sameCards = null;

        $lastAddedCard = end($this->hand);
        $lastAddedCardNum = $lastAddedCard->getNumber();

        for ($i = 0; $i < count($this->hand) - 1; $i++) {
            $card = $this->hand[$i];
            if ($card->getNumber() == $lastAddedCardNum) {
                $sameCards = [$this->hand[count($this->hand) - 1], $this->hand[$i]];
                array_splice($this->hand, $i, 1);
                array_pop($this->hand);
                break;
            }
        }

        return $sameCards;
    }

    public function toString(): string {
        $handCards = "";
        foreach ($this->hand as $card) {
            $handCards .= $card->toString() . " ";
        }
        return $handCards;
    }
}