<?php

namespace State;

class Turnstile
{
    private static TurnstileState $lockedState;
    private static TurnstileState $unlockedState;
    private TurnstileState $state;

    function __construct() {
        $this->lockedState = new LockedTurnstileState();
        $this->unlockedState = new UnlockedTurnStileState();
        $this->state = $this->lockedState;
    }

    public function coin(): void
    {
        $this->state->coin($this);
    }

    public function pass(): void
    {
        $this->state->pass($this);
    }

    public function setLocked(): void
    {
        $this->state = $this->lockedState;
    }

    public function setUnlocked(): void
    {
        $this->state = $this->unlockedState;
    }

    public function isLocked(): bool
    {
        return $this->state == $this->lockedState;
    }

    public function isUnlocked(): bool
    {
        return $this->state == $this->lockedState;
    }
}