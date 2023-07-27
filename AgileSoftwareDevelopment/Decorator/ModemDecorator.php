<?php

namespace Decorator;

class ModemDecorator implements Modem
{
    function __construct(
        private Modem $m,
    ) {}

    public function dial(string $pno): void
    {
        $this->m->setSpeakerVolume(11);
        $this->m->dial($pno);
    }

    public function setSpeakerVolume(int $volume): void
    {
        $this->m->setSpeakerVolume($volume);
    }

    public function getPhoneNumber(): string
    {
        return $this->m->getPhoneNumber();
    }

    public function getSpeakerVolume(): int
    {
        return $this->m->getSpeakerVolume();
    }
}