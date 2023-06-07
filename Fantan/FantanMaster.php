<?php

namespace Fantan;

use TrumpGame\Master;

class FantanMaster extends Master {
    const PASS_LIMIT = 3;

    public function pass(FantanPlayer $player): void {
        printf("{$player->toString()}さんは{$player->getPass()}回目のパスをしました\n");
        if ($player->getPass() > self::PASS_LIMIT) {
            printf("{$player->toString()}さんは負けです\n");
            $this->deregisterPlayer($player);
        }
    }
}