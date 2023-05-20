<?php

class Gear
{
    private int $chain_ring;
    private int $cog;
    private ?Wheel $wheel;

    function __construct(int $chain_ring, int $cog, Wheel $wheel = null) {
        $this->chain_ring = $chain_ring;
        $this->cog = $cog;
        $this->wheel = $wheel;
    }

    private function chain_ring(): int {
        return $this->chain_ring;
    }
    private function cog(): int {
        return $this->cog;
    }

    public function ratio(): float {
        return $this->chain_ring() / $this->cog();
    }

    public function gear_inches(): float {
        return $this->ratio() * $this->wheel->diameter();
    }
}
