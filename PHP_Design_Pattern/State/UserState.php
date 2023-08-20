<?php

namespace State;

interface UserState
{
    public function isAuthenticated(): bool;
    public function nextState(): UserState;
    public function getMenu(): string;
}