<?php

namespace Game\Interface;

use Game\Interface\PlayerInterface;

interface GameInterface
{
    public function startGame(): void;
    private function judgeHands(): ?PlayerInterface;
    private function showWinner(PlayerInterface $winner): string;
}