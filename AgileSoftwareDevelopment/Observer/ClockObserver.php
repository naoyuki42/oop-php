<?php

namespace Observer;

interface ClockObserver
{
    public function update(int $hours, int $minutes, int $seconds): void;
}