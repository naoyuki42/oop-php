<?php

namespace State;

use RuntimeException;

class AuthorizedState implements UserState
{
    private static UserState $singleton = null;

    public static function getInstance(): UserState
    {
        if (self::$singleton === null) {
            self::$singleton = new AuthorizedState();
        }
        return self::$singleton;
    }

    public function isAuthenticated(): bool
    {
        return true;
    }

    public function nextState(): UserState
    {
        return UnauthorizedState::getInstance();
    }

    public function getMenu(): string
    {
        return "カウントアップ";
    }

    public final function __clone(): void
    {
        throw new RuntimeException("Clone is not allowed against " . get_class($this));
    }
}