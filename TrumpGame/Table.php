<?php

namespace TrumpGame;

interface Table {
    public function putCard(array $card): void;

    public function getCards(): array;
}