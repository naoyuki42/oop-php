<?php

namespace Observer;

class MockTimeSink implements ClockObserver
{
    private int $hours = 0;
    private int $minutes = 0;
    private int $seconds = 0;

    public function getHours(): int
    {
        return $this->hours;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }

    public function getSeconds(): int
    {
        return $this->seconds;
    }

    public function update(int $hours, int $minutes, int $seconds): void
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }
}