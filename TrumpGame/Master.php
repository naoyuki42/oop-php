<?php

namespace TrumpGame;

class Master {
    private array $players;

    public function prepareGame(Hand $cards): void {
        printf("【カードを配ります】\n");

        $cards->shuffle();
        $numberOfCards = $cards->getNumberOfCards();

        for ($i = 0; $i < count($this->players); $i++) {
            $player = $this->players[$i % $numberOfPlayers];
            $player->receiveCard($cards[$i]);
        }
    }

    public function startGame(): void {
        printf("【ゲームを開始します】\n");

        $count = 0;
        while (count($this->players) > 1) {
            $playerIndex = $count % count($this->players);
            $nextPlayerIndex = ($count + 1) % count($this->players);

            $player = $this->players[$playerIndex];
            $nextPlayer = $this->players[$nextPlayerIndex];

            printf("{$player->toString()}さんの番です\n");
            $player->play($nextPlayer);
            $count += 1;
        }

        printf("【ゲームを終了しました】\n");
    }

    public function declareWin(Player $winner): void {
        printf("{$player->toString()}さんが上がりました\n");

        $this->deregisterPlayer($winner);
    }

    public function registerPlayer(Player $player): void {
        array_push($this->players, $player);
    }

    public function deregisterPlayer(Player $player): void {
        $removedIndex = array_search($player, $this->players);
        array_splice($this->players, $removedIndex, 1);

        if (count($this->players) === 1) {
            $loser = $this->players[0];
            printf("{$loser->toString()}の負けです\n");
        }
    }
}