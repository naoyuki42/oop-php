<?php

namespace Components;

class Bicycle {
    public $size;
    private $parts;

    function __construct($args = []) {
        $this->size = $args["size"];
        $this->parts = $args["parts"];
    }

    public function spares() {
        return array_merge([
            "size" => $this->size,
        ], $this->parts->spares());
    }
}