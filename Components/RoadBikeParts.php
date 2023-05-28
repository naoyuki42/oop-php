<?php

namespace Components;

use Components\Parts;

class RoadBikeParts extends Parts {
    public string $tape_color;

    public function post_construct($args) {
        $this->tape_color = $args["tape_color"];
    }

    public function default_tire_size() {
        return "23";
    }

    public function local_spares() {
        return [
            "tape_color" => $this->tape_color,
        ];
    }
}