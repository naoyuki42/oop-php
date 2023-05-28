<?php

namespace Components;

class Part {
    private $name;
    private $description;
    public $needs_spare;

    function __construct($args) {
        $this->name = $args["name"];
        $this->description = $args["description"];
        $this->needs_spare = $args["needs_spare"];
    }
}