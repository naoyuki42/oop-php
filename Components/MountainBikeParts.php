<?php

namespace Components;

use Components\Parts;

class MountainBikeParts extends Parts {
    public string $rear_shock;

    public function post_construct($args) {
        $this->rear_shock = $args["rear_shock"];
    }

    public function default_tire_size() {
        return "2.1";
    }

    public function local_spares() {
        return [
            "rear_shock" => $this->rear_shock,
        ];
    }
}