<?php

class Player {
    private Tactics $tactics;
    private int $win_count = 0;
    public string $name;

    public function __construct(array $args) {
        $this->name = $args["name"];
        $this->tactics = $args["tactics"];
    }

    public function show_hand(): string {
        return $this->tactics->readTactics();
    }

    public function notify_win(): void {
        $this->win_count += 1;
    }

    public function show_win_count(): int {
        return $this->win_count;
    }
}