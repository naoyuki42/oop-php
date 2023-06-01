<?php

require "Judge.php";
require "Player.php";

$judge = new Judge();
$player1 = new Player("村田");
$player2 = new Player("山田");

$judge->start_janken($player1, $player2);