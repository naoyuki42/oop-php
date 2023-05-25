<?php

require "Extends/Bicycle.php";

class MountainBike extends Bicycle {
    public string $size;
    public string $front_shock;
    public string $rear_shock;

    function __construct(string $size, string $front_shock, string $rear_shock) {
        $this->size = $size;
        $this->front_shock = $front_shock;
        $this->rear_shock = $rear_shock;
    }

    public function spares(): array {
        return [
            "size" => $this->size,
            "front_shock" => $this->front_shock,
            "rear_shock" => $this->rear_shock,
        ];;
    }
}