<?php

namespace OldMaid;

class Master {
    private array $players = [];

    public function prepareGame(Hand $cards): void {
        printf("【カードを配ります】\n");

        $cards->shuffle();
        $numberOfCards = $cards->getNumberOfCard();
        $numberOfPlayers = count($this->players);

        for ($i = 0; $i < $numberOfCards; $i++) {
            $card = $cards->pickCard();
            $player = $this->players[$i % $numberOfPlayers];
            $player->receiveCard($card);
        }
    }

    public function startGame(): void {
        printf("【ババ抜きを開始します】\n");

        $count = 0;
        while (count($this->players) > 1) {
            $playerIndex = $count % count($this->players);
            $nextPlayerIndex = ($count + 1) % count($this->players);

            $player = $this->players[$playerIndex];
            $nextPlayer = $this->players[$nextPlayerIndex];

            printf("{$player->toString()}の番です\n");
            $player->play($nextPlayer);
            $count += 1;
        }

        if (count($this->players) == 1) {
            $loser = $this->players[0];
            printf("【ババ抜きを終了しました】\n");
            printf("{$loser->toString()}の負けです\n");
        }
    }

    public function declareWin(Player $winner): void {
        printf("{$winner->toString()}が上がりました\n");
        $index = array_search($winner, $this->players);
        array_splice($this->players, $index, 1);
    }

    public function registerPlayer(Player $player): void {
        array_push($this->players, $player);
    }
}