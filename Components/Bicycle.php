<?php

namespace Components;

class Bicycle {
    public $size;
    private $parts;

    function __construct($args = []) {
        $this->size = $args["size"];
        $this->parts = $args["parts"];
    }

    public function size() {
        return $this->parts->size;
    }

    public function spares() {
        return $this->parts->spares();
    }
}