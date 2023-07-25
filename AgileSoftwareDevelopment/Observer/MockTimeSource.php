<?php

namespace Observer;

class MockTimeSource implements TimeSource
{
    private TimeSourceImplementation $tmImp;

    function __construct()
    {
        $this->tmImp = new TimeSourceImplementation();
    }

    public function registerObserver(ClockObserver $observer): void
    {
        $this->tmImp->registerObserver($observer);
    }

    public function setTime(int $hours, int $minutes, int $seconds): void
    {
        $this->tmImp->notify($hours, $minutes, $seconds);
    }
}