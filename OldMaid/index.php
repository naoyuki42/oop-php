<?php

namespace OldMaid;

require_once "Master.php";
require_once "Table.php";
require_once "Player.php";
require_once "Hand.php";
require_once "Card.php";

$master = new Master();
$table = new Table();

$murata = new Player("村田", $master, $table);
$yamada = new Player("山田", $master, $table);
$saito = new Player("斎藤", $master, $table);

$trump = createTrump();

$master->registerPlayers([$murata, $yamada, $saito]);
$master->prepareGame($trump);

// NOTE:無限ループするので要修正
$master->startGame();

function createTrump(): Hand {
    $trump = new Hand();
    for ($i = 1; $i <= 13; $i++) {
        $trump->addCard(new Card("S", $i));
        $trump->addCard(new Card("D", $i));
        $trump->addCard(new Card("C", $i));
        $trump->addCard(new Card("H", $i));
    }
    $trump->addCard(new Card("JK", 0));
    return $trump;
};