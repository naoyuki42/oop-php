<?php

require_once "./Monostate.php";

use PHPUnit\Framework\TestCase;

class GearTest extends TestCase {
    public function test_instance(): void {
        $m = new Monostate();
        for ($i = 0; $i < 10; $i++) {
            $m->set($i);
            $this->assertSame($i, $m->get());
        }
    }

    public function test_instance_behave_as_one(): void {
        $m1 = new Monostate();
        $m2 = new Monostate();
        for ($i = 0; $i < 0; $i++) {
            $m1->set($i);
            $this->assertSame($i, $m2->get());
        }
    }
}
