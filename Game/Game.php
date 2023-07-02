<?php

namespace Game;

use Game\GameInterface;
use Game\PlayerInterface;

class Game implements GameInterface
{
    public function __construct(
        private PlayerInterface $player1,
        private PlayerInterface $player2,
    ) {}

    public function startGame(): void
    {
        echo "【ゲーム開始】\n";

        $player1Hand = $this->player1->getHand();
        echo "【プレイヤー1】" . $player1Hand . "\n";
        $player2Hand = $this->player2->getHand();
        echo "【プレイヤー2】" . $player2Hand . "\n";

        $winner = $this->judgeHands($player1Hand, $player2Hand);
        if ($winner !== null) {
            $winnerName = $this->showWinner($winner);
            echo "【結果】" . $winnerName . "の勝ち\n";
        } else {
            echo "【結果】引き分け\n";
        }

        echo "【ゲーム終了】\n";
    }

    private function judgeHands(string $player1Hand, string $player2Hand): ?PlayerInterface
    {
        $winner = null;
        if (($player1Hand === "グー" && $player2Hand === "チョキ")
            || ($player1Hand === "チョキ" && $player2Hand === "パー")
            || ($player1Hand === "パー" && $player2Hand === "グー")
            ) {
                $winner = $this->player1;
        } elseif (($player2Hand === "グー" && $player1Hand === "チョキ")
            || ($player2Hand === "チョキ" && $player1Hand === "パー")
            || ($player2Hand === "パー" && $player1Hand === "グー")
            ) {
                $winner = $this->player2;
        }
        return $winner;
    }

    private function showWinner(PlayerInterface $winner): string
    {
        return $winner->getName();
    }
}