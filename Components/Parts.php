<?php

namespace Components;

class Parts {
    private array $parts;

    function __construct($args = []) {
        $this->parts = $args;
    }

    public function spares() {
        return array_filter($this->parts, fn($part) => $part->needs_spare);
    }
}