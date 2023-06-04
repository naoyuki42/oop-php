<?php

namespace OldMaid;

class Player {
    private Master $master;
    private Table $table;
    private Hand $myHand;
    private string $name;

    public function __construct(string $name, Master $master, Table $table) {
        $this->name = $name;
        $this->master = $master;
        $this->table = $table;
        $this->myHand = new Hand();
    }

    public function play(Player $nextPlayer): void {
        $card = $this->myHand->pickCard();
        printf("{$this->name}が{$card->toString()}を出しました\n");
        $this->table->putCard($card);

        if ($this->myHand->getNumberOfCard() === 0) {
            $this->master->declareWin($this);
        } else {
            printf("{$this->toString()}:残りの手札は{$this->myHand->toString()}です\n");
        }
    }

    public function receiveCard(Card $card): void {
        $this->myHand->addCard($card);
    }

    public function toString(): string {
        return $this->name;
    }
}