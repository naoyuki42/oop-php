<?php

namespace Fantan;

use TrumpGame\Player;
use TrumpGame\Master;
use TrumpGame\Table;
use TrumpGame\Rule;

class FantanPlayer extends Player {
    private int $pass;

    public function __construct(string $name, Master $master, Table $table, Rule $rule) {
        parent::__construct($name, $master, $table, $rule);
    }

    public function receiveCard(Card $card): void {
        if ($card->getNumber() === 7) {
            printf("{$this->name}:{$card->toString()}を置きました\n");
            $table->putCard($card);
        } else {
            $this->mayHand->addCard($card);
        }
    }

    public function play(Player $nextPlayer): void {
        printf($this->myHand()->toString());

        $candidate = $rule->findCandidate($this->myHand, $this->table);
        if ($candidate != null) {
            printf("{$candidate->toString()}を置きました\n");
            $this->table->putCard($candidate);

            printf("{$this->table->toString()}\n");

            if ($this->myHand->getNumberCards() === 0) {
                $this->master->declareWin($this);
            }
        } else {
            $this->pass += 1;
            $this->master->pass($this);
            if ($this->pass > FantanMaster::PASS_LIMIT) {
                foreach ($this->myHand as $card) {
                    $this->table->putCard($card);
                }
            }
        }
    }

    public function getPass(): int {
        return $this->pass;
    }
}