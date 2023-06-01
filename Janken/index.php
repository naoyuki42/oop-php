<?php

const ROCK = 0;
const SCISSORS = 1;
const PAPER = 2;

$player1_win_count = 0;
$player2_win_count = 0;

printf("【ジャンケン開始】\n");

for ($i = 1; $i <= 3; $i++) {
    printf("【{$i}回戦目】\n");

    $player1_hand = array_rand([ROCK, SCISSORS, PAPER], 1);

    switch ($player1_hand) {
        case ROCK:
            printf("グー");
            break;
        case SCISSORS:
            printf("チョキ");
            break;
        case PAPER:
            printf("パー");
            break;
    }

    printf(" vs ");

    $player2_hand = array_rand([ROCK, SCISSORS, PAPER], 1);

    switch ($player2_hand) {
        case ROCK:
            printf("グー");
            break;
        case SCISSORS:
            printf("チョキ");
            break;
        case PAPER:
            printf("パー");
            break;
    }

    printf("\n");

    if (($player1_hand === ROCK && $player2_hand === SCISSORS)
        || ($player1_hand === SCISSORS && $player2_hand === PAPER)
        || ($player1_hand === PAPER && $player2_hand === ROCK)
        ) {
            $player1_win_count += 1;
            printf("プレイヤー1が勝ちました。\n");
    } elseif (($player2_hand === ROCK && $player1_hand === SCISSORS)
        || ($player2_hand === SCISSORS && $player1_hand === PAPER)
        || ($player2_hand === PAPER && $player1_hand === ROCK)
        ) {
            $player2_win_count += 1;
            printf("プレイヤー2が勝ちました。\n");
    } else {
        printf("引き分けです。\n");
    }
}

printf("【ジャンケン終了】\n");

if ($player1_win_count > $player2_win_count) {
    printf("{$player1_win_count}対{$player2_win_count}でプレイヤー1の勝ちです。\n");
}

if ($player1_win_count < $player2_win_count) {
    printf("{$player1_win_count}対{$player2_win_count}でプレイヤー2の勝ちです。\n");
}

if ($player1_win_count === $player2_win_count) {
    printf("{$player1_win_count}対{$player2_win_count}で引き分けです。\n");
}