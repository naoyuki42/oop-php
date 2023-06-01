<?php

class Player {
    private string $ROCK = "グー";
    private string $SCISSORS = "チョキ";
    private string $PAPER = "パー";
    private int $win_count = 0;

    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function show_hand(): string {
        $hands = [$this->ROCK, $this->SCISSORS, $this->PAPER];
        $index = array_rand([
            $this->ROCK,
            $this->SCISSORS,
            $this->PAPER
        ], 1);
        return $hands[$index];
    }

    public function notify_win(): void {
        $this->win_count += 1;
    }

    public function show_win_count(): int {
        return $this->win_count;
    }
}