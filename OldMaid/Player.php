<?php

namespace OldMaid;

class Player {
    private Master $master;
    private Table $table;
    private Hand $myHand;
    public string $name;

    public function __construct(string $name, Master $master, Table $table) {
        $this->name = $name;
        $this->master = $master;
        $this->table = $table;
        $this->myHand = new Hand();
    }

    public function play(Player $nextPlayer): void {
        $nextHand = $nextPlayer->showHand();
        $pickedCard = $nextHand->pickedCard();

        $string = "{$this->showName()}:{$nextPlayer->showName()}さんから{$pickedCard->showCard()}を引きました。\n";
        printf($string);

        $this->dealCard($pickedCard);

        if ($this->myHand->getNumberOfCards() === 0) {
            $this->master->declareWin($this);
        } else {
            $string = "{$this->showName()}:残りの手札は{$this->myHand->showHand()}です\n";
            printf($string);
        }
    }

    public function showHand(): Hand {
        if ($this->myHand->getNumberOfCards() === 1) {
            $this->master->declareWin($this);
        }

        return $this->myHand;
    }

    public function receiveCard(Card $card): void {
        $this->dealCard($card);
    }

    private function dealCard(Card $card): void {
        $this->myHand->addCard($card);

        $sameCards = $this->myHand->findSameNumberCard();

        if (!empty($sameCards)) {
            $this->table->disposeCard($sameCards[0]);
        }
    }

    public function showName(): string {
        return $this->name;
    }
}