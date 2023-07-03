<?php

namespace Game;

require_once "Game.php";
require_once "Player.php";

use Game\Game;
use Game\Player;

main();

function main()
{
    $hands = ["グー", "チョキ", "パー"];
    $player1 = new Player("田中", $hands);
    $player2 = new Player("鈴木", $hands);
    $game = new Game($player1, $player2);
    $game->startGame();
}
