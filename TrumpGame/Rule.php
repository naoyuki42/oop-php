<?php

namespace TrumpGame;

interface Rule {
    public function findCandidate(Hand $hand, Table $table): array | null;
}