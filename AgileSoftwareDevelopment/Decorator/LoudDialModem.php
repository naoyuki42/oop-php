<?php

namespace Decorator;

class LoudDialModem extends ModemDecorator
{
    function __construct(
        private Modem $m,
    ) {
        parent::__construct($m);
    }

    public function dial(string $pno): void
    {
        parent::setSpeakerVolume(11);
        parent::dial($pno);
    }
}