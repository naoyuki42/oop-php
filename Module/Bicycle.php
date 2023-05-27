<?php

namespace Module;

require_once "Module/Schedulable.php";

class Bicycle {
    use Schedulable;

    function __construct($args = []) {
        $this->schedule($args);
    }

    public function lead_days() {
        return 1;
    }
}