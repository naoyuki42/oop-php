<?php

namespace Game\Interface;

interface GameInterface
{
    public function startGame(): void;
    public function judgeHands(string $player1Hand, string $player2Hand): ?PlayerInterface;
    public function showWinner(PlayerInterface $winner): string;
}