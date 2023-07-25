<?php

namespace Observer;

use PHPUnit\Framework\TestCase;

class ClockDriverTest extends TestCase
{
    private MockTimeSource $source;
    private MockTimeSink $sink;

    public function setUp(): void
    {
        $this->source = new MockTimeSource();
        $this->sink = new MockTimeSink();
        $this->source->registerObserver($this->sink);
    }

    private function assertSinkEquals(MockTimeSink $sink, int $hours, int $minutes, int $seconds): void
    {
        $this->assertSame($hours, $sink->getHours());
        $this->assertSame($minutes, $sink->getMinutes());
        $this->assertSame($seconds, $sink->getSeconds());
    }

    public function test_time_change(): void
    {
        $this->source->setTime(3, 4, 5);
        $this->assertSinkEquals($this->sink, 3, 4, 5);
        $this->source->setTime(7, 8, 9);
        $this->assertSinkEquals($this->sink, 7, 8, 9);
    }

    public function test_multiple_sinks(): void
    {
        $sink2 = new MockTimeSink();
        $this->source->registerObserver($sink2);
        $this->source->setTime(12, 13, 14);

        $this->assertSinkEquals($this->sink, 12, 13, 14);
        $this->assertSinkEquals($sink2, 12, 13, 14);
    }
}