<?php

namespace Factory\Test;

use Factory\Circle;
use Factory\ShapeFactory;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    private ShapeFactory $factory;

    public function setUp(): void
    {
        $this->factory = new ShapeFactory();
    }

    public function test_create_circle(): void
    {
        $s = $this->factory->make("Circle");
        $this->assertTrue($s instanceof Circle);
    }
}