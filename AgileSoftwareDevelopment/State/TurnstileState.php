<?php

namespace State;

interface TurnstileState
{
    public function coin(Turnstile $t): void;
    public function pass(Turnstile $t): void;
}

class LockedTurnstileState implements TurnstileState
{
    public function coin(Turnstile $t): void
    {
        $t->setUnlocked();
    }

    public function pass(Turnstile $t): void
    {}
}

class UnlockedTurnStileState implements TurnstileState
{
    public function coin(Turnstile $t): void
    {}

    public function pass(Turnstile $t): void
    {
        $t->setLocked();
    }
}