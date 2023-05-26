<?php

namespace Extends;

use Extends\Bicycle;

class MountainBike extends Bicycle {
    public string $front_shock;
    public string $rear_shock;

    public function post_construct($args) {
        $this->front_shock = $args["front_shock"];
        $this->rear_shock = $args["rear_shock"];
    }

    public function default_tire_size() {
        return "2.1";
    }

    public function local_spares() {
        return [
            "front_shock" => $this->front_shock,
            "rear_shock" => $this->rear_shock,
        ];
    }
}