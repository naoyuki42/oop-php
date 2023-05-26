<?php

namespace Extends;

use Extends\Bicycle;

class RecumbentBike extends Bicycle {
    public string $flag;

    public function post_construct($args) {
        $this->flag = $args["flag"];
    }

    public function default_chain() {
        return "9-speed";
    }

    public function default_tire_size() {
        return "28";
    }

    public function local_spares() {
        return [
            "flag" => $this->flag,
        ];
    }
}