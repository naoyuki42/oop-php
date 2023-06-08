<?php

namespace Fantan;

require_once "../TrumpGame/Card.php";
require_once "../TrumpGame/Hand.php";
require_once "../TrumpGame/Master.php";
require_once "../TrumpGame/Player.php";
require_once "../TrumpGame/Rule.php";
require_once "../TrumpGame/Table.php";

require_once "FantanMaster.php";
require_once "FantanTable.php";
require_once "FantanPlayer.php";
require_once "FantanRule.php";

use TrumpGame\Hand;
use TrumpGame\Card;

$master = new FantanMaster();
$table = new FantanTable();
$rule = new FantanRule();

$murata = new FantanPlayer("村田", $master, $table, $rule);
$yamada = new FantanPlayer("山田", $master, $table, $rule);
$saito = new FantanPlayer("斎藤", $master, $table, $rule);

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
    return $trump;
}