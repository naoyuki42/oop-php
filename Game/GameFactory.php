<?php

namespace Game;

require_once "Game.php";
require_once "Player.php";
require_once "Interface/GameInterface.php";
require_once "Interface/PlayerInterface.php";

use Game\Interface\GameInterface;

class GameFactory
{
    // TODO:PlayerとGameについて知っているのが良くないのでは？
    public function createGame(string $player1_name, string $player2_name, array $hands): GameInterface
    {
        // TODO:ユーザーを配列で作成するように修正
        $player1 = new Player($player1_name, $hands);
        $player2 = new Player($player2_name, $hands);
        return new Game($player1, $player2);
    }
}