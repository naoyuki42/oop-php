<?php

namespace Decorator;

interface Modem
{
    public function dial(string $pno): void;
    public function setSpeakerVolume(int $volume): void;
    public function getPhoneNumber(): string;
    public function getSpeakerVolume(): int;
}