<?php

namespace UnitTest;

class Gear {
    private $chain_ring;
    private $cog;
    private $wheel;
    // private $observer;

    public function __construct($args) {
        $this->chain_ring = $args["chain_ring"];
        $this->cog = $args["cog"];
        $this->wheel = $args["wheel"];
        // $this->observer = $args["observer"] ?? null;
    }

    public function gear_inches() {
        return $this->ratio() * $this->wheel->diameter();
    }

    private function ratio() {
        return $this->chain_ring / $this->cog;
    }

    // public function set_cog($new_cog) {
    //     $this->cog = $new_cog;
    //     $this->changed();
    // }

    // public function set_chain_ring($new_chain_ring) {
    //     $this->chain_ring = $new_chain_ring;
    //     $this->changed();
    // }

    // public function changed() {
    //     return $this->observer->changed($this->chain_ring, $this->cog);
    // }
}