<?php

namespace OldMaid;

class Master {
    private array $players = [];

    public function prepareGame(Hand $cards): void {
        printf("【カードを配ります】\n");

        $cards->shuffle();
        $numberOfPlayers = count($this->players);

        for ($i = 0; $i < $cards->getNumberOfCards(); $i++) {
            $card = $cards->pickedCard();
            $player = $this->players[$i % $numberOfPlayers];
            $player->receiveCard($card);
        }
    }

    public function startGame(): void {
        printf("【ババ抜きを開始します】\n");

        for ($i = 0; count($this->players) > 1; $i++) {
            $playerIndex = $i % count($this->players);
            $nextPlayerIndex = ($i + 1) % count($this->players);

            $player = $this->players[$playerIndex];
            $nextPlayer = $this->players[$nextPlayerIndex];

            printf("{$player->showName()}さんの番です\n");
            $player->play($nextPlayer);
        }

        printf("【ババ抜きを終了します】\n");
    }

    public function declareWin(Player $winner): void {
        printf("{$winner->showName()}が上がりました\n");

        $winnerIndex = array_search($winner, $this->players);
        array_splice($this->players, $winnerIndex, 1);

        if (count($this->players) === 1) {
            printf("{$this->players[0]->showName()}さんの負けです\n");
        }
    }

    public function registerPlayers(array $players): void {
        $this->players = $players;
    }
}