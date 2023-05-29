<?php

namespace UnitTest;

class Gear {
    private $chain_ring;
    private $cog;
    private $wheel;

    public function __construct($args) {
        $this->chain_ring = $args["chain_ring"];
        $this->cog = $args["cog"];
        $this->wheel = $args["wheel"];
    }

    public function gear_inches() {
        return $this->ratio() * $this->wheel->diameter();
    }

    private function ratio() {
        return $this->chain_ring / $this->cog;
    }
}