<?php

namespace Observer;

class TimeSourceImplementation
{
    private array $observers = [];

    public function notify(int $hours, int $minutes, int $seconds): void
    {
        foreach($this->observers as $observer) {
            $observer->update($hours, $minutes, $seconds);
        }
    }

    public function registerObserver(ClockObserver $observer): void
    {
        $this->observers[] = $observer;
    }
}