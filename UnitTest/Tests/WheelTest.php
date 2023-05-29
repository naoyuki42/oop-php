<?php

namespace UnitTest\Tests;

use PHPUnit\Framework\TestCase;
use UnitTest\Wheel;

class WheelTest extends TestCase {
    public function test_calculate_diameter() {
        $wheel = new Wheel(26, 1.5);
        $this->assertEquals(29.0, round($wheel->diameter(), 1));
    }
}