<?php

require "Judge.php";
require "Player.php";
require "Tactics.php";

$judge = new Judge();

$random_tactics = new RandomTactics();
$rock_only_tactics = new RockOnlyTactics();

$player1 = new Player([
    "name" => "村田",
    "tactics" => $random_tactics,
]);
$player2 = new Player([
    "name" => "山田",
    "tactics" => $rock_only_tactics,
]);

$judge->start_janken($player1, $player2);