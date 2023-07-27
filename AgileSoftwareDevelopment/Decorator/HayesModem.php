<?php

namespace Decorator;

class HayesModem implements Modem
{
    private string $phoneNumber = "";
    private int $volume = 0;

    public function dial(string $pno): void
    {
        $this->phoneNumber = $pno;
    }

    public function setSpeakerVolume(int $volume): void
    {
        $this->volume = $volume;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getSpeakerVolume(): int
    {
        return $this->volume;
    }
}