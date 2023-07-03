<?php

namespace Game;

require_once "GameFactory.php";

use Game\GameFactory;

main();

function main()
{
    $player1_name = "田中";
    $player2_name = "鈴木";
    $hands = ["グー", "チョキ", "パー"];

    $gameFactory = new GameFactory();
    $game = $gameFactory->createGame($player1_name, $player2_name, $hands);
    $game->startGame();
}
