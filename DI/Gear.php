<?php

class Gear
{
    private int $chain_ring;
    private int $cog;

    function __construct(int $chain_ring, int $cog) {
        $this->chain_ring = $chain_ring;
        $this->cog = $cog;
    }

    public function gear_inches(float $diameter): float {
        return $this->ratio() * $diameter;
    }

    public function ratio(): float {
        return $this->chain_ring / $this->cog;
    }
}
