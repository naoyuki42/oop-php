<?php

interface Tactics {
    public function readTactics(): string;
}

class RandomTactics implements Tactics {
    private array $hands = [
        "ROCK" => "グー",
        "SCISSORS" => "チョキ",
        "PAPER" => "パー",
    ];

    public function readTactics(): string {
        $index = array_rand($this->hands, 1);
        return $this->hands[$index];
    }
}

class RockOnlyTactics implements Tactics {
    private array $hands = [
        "ROCK" => "グー",
    ];

    public function readTactics(): string {
        $index = array_rand($this->hands, 1);
        return $this->hands[$index];
    }
}