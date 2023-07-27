<?php

namespace Decorator;

use PHPUnit\Framework\TestCase;

class ModemDecoratorTest extends TestCase
{
    public function test_create_hayes(): void
    {
        $m = new HayesModem();
        $this->assertSame("", $m->getPhoneNumber());

        $m->dial("5551212");
        $this->assertSame("5551212", $m->getPhoneNumber());
        $this->assertSame(0, $m->getSpeakerVolume());

        $m->setSpeakerVolume(10);
        $this->assertSame(10, $m->getSpeakerVolume());
    }

    public function test_loud_dial_modem(): void
    {
        $m = new HayesModem();
        $d = new LoudDialModem($m);
        $this->assertSame("", $d->getPhoneNumber());
        $this->assertSame(0, $d->getSpeakerVolume());

        $d->dial("5551212");
        $this->assertSame("5551212", $d->getPhoneNumber());
        $this->assertSame(11, $d->getSpeakerVolume());
    }
}