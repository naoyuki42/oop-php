<?php

namespace Fantan;

use TrumpGame\Player;
use TrumpGame\Master;
use TrumpGame\Table;
use TrumpGame\Rule;
use TrumpGame\Card;

class FantanPlayer extends Player {
    private int $pass = 0;

    public function __construct(string $name, Master $master, Table $table, Rule $rule) {
        parent::__construct($name, $master, $table, $rule);
    }

    public function receiveCard(Card $card): void {
        if ($card->getNumber() === 7) {
            printf("{$this->name}:{$card->toString()}を置きました\n");
            $this->table->putCard($card);
        } else {
            $this->myHand->addCard($card);
        }
    }

    public function play(Player $nextPlayer): void {
        printf($this->myHand->toString());

        $candidate = $this->rule->findCandidate($this->myHand, $this->table);
        if ($candidate != null) {
            printf("{$candidate->toString()}を置きました\n");
            $this->table->putCard($candidate);

            printf("{$this->table->toString()}\n");

            if ($this->myHand->getNumberOfCards() === 0) {
                $this->master->declareWin($this);
            }
        } else {
            $this->pass += 1;
            $this->master->pass($this);
            if ($this->pass > FantanMaster::PASS_LIMIT) {
                foreach ($this->myHand->hand as $card) {
                    $this->table->putCard($card);
                }
            }
        }
    }

    public function getPass(): int {
        return $this->pass;
    }
}