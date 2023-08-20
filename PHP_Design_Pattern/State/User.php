<?php

namespace State;

class User
{
    public function __construct(
        private string $name,
        private UserState $state,
        private int $count = 0,
    ) {
        $this->state = UnauthorizedState::getInstance();
        $this->resetCount();
    }

    public function switchState(): void
    {
        $this->state = $this->state->nextState();
        $this->resetCount();
    }

    public function isAuthenticated(): bool
    {
        return $this->state->isAuthenticated();
    }

    public function getMenu(): string
    {
        return $this->state->getMenu();
    }

    public function getUserName(): string
    {
        return $this->name;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function incrementCount(): void
    {
        $this->count++;
    }

    private function resetCount(): void
    {
        $this->count = 0;
    }
}