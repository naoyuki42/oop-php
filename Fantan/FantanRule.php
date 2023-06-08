<?php

namespace Fantan;

use TrumpGame\Rule;
use TrumpGame\Hand;
use TrumpGame\Table;
use TrumpGame\Card;

class FantanRule implements Rule {
    public function findCandidate(Hand $hand, Table $table): Card | null {
        $candidate = null;
        for ($i = 0; $i < $hand->getNumberOfCards(); $i++) {
            $lookingCard = $hand->lookCard($i);
            $number = $lookingCard->getNumber();
            $suit = $lookingCard->getSuit();

            $leftNumber = ($number !== 1) ? $number - 1: Card::CARD_NUM;
            $rightNumber = ($number !== Card::CARD_NUM) ? $number + 1: 1;

            $isPutLeft = $this->isThereCard($table, $suit, $leftNumber);
            $isPutRight = $this->isThereCard($table, $suit, $rightNumber);

            if ($isPutLeft || $isPutRight) {
                $candidate = $hand->pickCard($i);
                break;
            }
        }
        return $candidate;
    }

    public function isThereCard(Table $table, int $suit, int $number): bool {
        $cards = $table->getCards();
        return ($cards[$suit][$number] !== "..");
    }
}