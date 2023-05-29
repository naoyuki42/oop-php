<?php

namespace UnitTest\Tests;

use PHPUnit\Framework\TestCase;
use UnitTest\Gear;
use UnitTest\Wheel;

class GearTest extends TestCase {
    public function test_calculate_gear_inches() {
        $gear = new Gear([
            "chain_ring" => 52,
            "cog" => 11,
            "wheel" => new Wheel(26, 1.5),
        ]);
        $this->assertEquals(137.1, round($gear->gear_inches(), 1));
    }
}