<?php

namespace OldMaid;

class Player {
    private Master $master;
    private Table $table;
    private Hand $myHand;
    public string $name;

    public function construct(string $name, Master $master, Table $table) {
        $this->name = $name;
        $this->master = $master;
        $this->table = $table;
        $this->myHand = new Hand();
    }

    public function play(Player $nextPlayer): void {
        $nextHand = $nextPlayer->showHand();
        $pickedCard  $nextHand->pickedCard();

        $string = "{$this->name}:{$nextPlayer->name}さんから{$pickedCard->toString()}を引きました。\n";
        printf($string);

        $this->dealCard($pickedCard);

        if ($this->myHand->getNumberOfCards() === 0) {
            $this->master->declareWin($this);
        } else {
            $string = "{$this->name}:残りの手札は{$this->myHand->toString()}です";
            printf($string);
        }
    }

    public function showHand(): Hand {
        if ($this->myHand->getNumberOfCards() === 1) {
            $this->master->declareWin($this);
        }

        $this->myHand->shuffle();

        return $this->myHand;
    }

    public function receiveCard(Card $card): void {
        $this->dealCard($card);
    }

    public function dealCard(Card $card): void {
        $this->myHand->addCard($card);

        $sameCards = $this->myHand->findSameNumberCard();

        if ($sameCards != null) {
            $table->disposeCard($sameCards);
        }
    }

    public function toString(): string {
        return $this->name;
    }
}