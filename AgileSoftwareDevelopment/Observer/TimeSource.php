<?php

namespace Observer;

interface TimeSource
{
    public function registerObserver(ClockObserver $observer): void;
}