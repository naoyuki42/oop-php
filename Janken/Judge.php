<?php

class Judge {
    public function start_janken(Player $player1, Player $player2): void {
        printf("【ジャンケン開始】\n");

        for ($i = 1; $i <= 3; $i++) {
            printf("【{$i}回戦目】\n");

            $winner = $this->judge_janken($player1, $player2);

            if ($winner?->name === $player1->name) {
                $player1->notify_win();
            }

            if ($winner?->name === $player2->name) {
                $player2->notify_win();
            }

            printf(
                ($winner != null)
                    ? "{$winner->name}が勝ちました。\n"
                    : "引き分けです。\n"
            );
        }

        printf("【ジャンケン終了】\n");

        $final_winner = $this->judge_final_winner($player1, $player2);

        printf("{$player1->show_win_count()}対{$player2->show_win_count()}で");
        printf(
            ($final_winner != null)
                ? "{$final_winner->name}が勝ちました。\n"
                : "引き分けです。\n"
        );
    }

    private function judge_janken(Player $player1, Player $player2): Player | null {
        $player1_hand = $player1->show_hand();
        $player2_hand = $player2->show_hand();
        printf("{$player1_hand} vs {$player2_hand}\n");

        $winner = null;
        if (($player1_hand === "グー" && $player2_hand === "チョキ")
            || ($player1_hand === "チョキ" && $player2_hand === "パー")
            || ($player1_hand === "パー" && $player2_hand === "グー")
            ) {
                $winner = $player1;
        } elseif (($player2_hand === "グー" && $player1_hand === "チョキ")
            || ($player2_hand === "チョキ" && $player1_hand === "パー")
            || ($player2_hand === "パー" && $player1_hand === "グー")
            ) {
                $winner = $player2;
        }

        return $winner;
    }

    private function judge_final_winner(Player $player1, Player $player2): Player | null {
        $player1_win_count = $player1->show_win_count();
        $player2_win_count = $player2->show_win_count();

        $winner = null;
        if ($player1_win_count > $player2_win_count) {
            $winner = $player1;
        } elseif ($player1_win_count < $player2_win_count) {
            $winner = $player2;
        }

        return $winner;
    }
}