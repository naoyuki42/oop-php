<?php

namespace Extends;

abstract class Bicycle {
    public ?string $size;
    public ?string $chain;
    public ?string $tire_size;

    public function __construct($args) {
        $this->size = $args["size"];
        $this->chain = $args["chain"] ?: $this->default_chain();
        $this->tire_size = $args["tire_size"] ?: $this->default_tire_size();

        $this->post_construct($args);
    }

    public function post_construct($args) {
        return;
    }

    public function local_spares() {
        return [];
    }

    public function default_chain() {
        return "10-speed";
    }

    abstract public function default_tire_size();

    public function spares(): array {
        return array_merge([
            "chain" => $this->chain,
            "tire_size" => $this->tire_size,
        ], $this->local_spares());
    }
}