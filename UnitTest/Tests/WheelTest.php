<?php

namespace UnitTest\Tests;

use PHPUnit\Framework\TestCase;
use UnitTest\Wheel;

class WheelTest extends TestCase {
    private $wheel;

    public function setUp(): void {
        $this->wheel = new Wheel(26, 1.5);
    }

    public function test_implements_the_diameterizable_interface() {
        $this->assertTrue(method_exists($this->wheel, "diameter"));
    }

    public function test_calculate_diameter() {
        $wheel = new Wheel(26, 1.5);
        $this->assertEquals(29.0, round($wheel->diameter(), 1));
    }
}