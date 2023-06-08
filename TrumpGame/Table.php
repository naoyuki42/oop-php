<?php

namespace TrumpGame;

interface Table {
    public function putCard(Card $card): void;

    public function getCards(): array;
}