<?php

require "Gear.php";

class Wheel {
    private int $rim;
    private float $tire;
    private Gear $gear;

    function __construct(int $rim, float $tire, int $chain_ring, int $cog) {
        $this->rim = $rim;
        $this->tire = $tire;
        $this->gear = new Gear($chain_ring, $cog);
    }

    public function diameter(): float {
        return $this->rim + ($this->tire * 2);
    }

    public function gear_inches(): float {
        return $this->gear->gear_inches($this->diameter());
    }
}
