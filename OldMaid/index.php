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

$master->registerPlayer($murata);
$master->registerPlayer($yamada);
$master->registerPlayer($saito);

$trump = createTrump();

$master->prepareGame($trump);

$master->startGame();

function createTrump(): Hand {
    $trump = new Hand();
    for ($i = 1; $i <= 13; $i++) {
        $trump->addCard(new Card(Card::CLUB, $i));
        $trump->addCard(new Card(Card::DIAMOND, $i));
        $trump->addCard(new Card(Card::HEART, $i));
        $trump->addCard(new Card(Card::SPADE, $i));
    }
    $trump->addCard(new Card(Card::JOKER, 0));
    return $trump;
}