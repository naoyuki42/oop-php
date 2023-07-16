<?php

class Monostate
{
    private static int $x = 0;

    public function set($x): void
    {
        $this->x = $x;
    }

    public function get(): int
    {
        return $this->x;
    }
}