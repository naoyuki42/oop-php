<?php

namespace TrumpGame;

abstract class Player {
    protected string $name;
    protected Table $table;
    protected Hand $myHand = new Hand();
    protected Master $master;
    protected Rule $rule;

    public function __construct(string $name, Master $master, Table $table, Rule $rule) {
        $this->name;
        $this->master;
        $this->table;
        $this->rule;
    }

    public abstract function play(Player $nextPlayer): void;

    public function receiveCard(Card $card): void {
        $this->mayHand->addCard($this->card);
    }

    public function toString(): string {
        return $this->name;
    }
}