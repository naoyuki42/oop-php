<?php

namespace State;

use RuntimeException;

class UnauthorizedState implements UserState
{
    private static UserState $singleton = null;

    public static function getInstance(): UserState
    {
        if (self::$singleton === null) {
            self::$singleton = new UnauthorizedState();
        }
        return self::$singleton;
    }

    public function isAuthenticated(): bool
    {
        return false;
    }

    public function nextState(): UserState
    {
        return AuthorizedState::getInstance();
    }

    public function getMenu(): string
    {
        return "ログイン";
    }

    public final function __clone(): void
    {
        throw new RuntimeException("Clone is not allowed against " . get_class($this));
    }
}