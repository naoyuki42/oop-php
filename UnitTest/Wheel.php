<?php

namespace UnitTest;

class Wheel {
    private $rim;
    private $tire;

    public function __construct($rim, $tire) {
        $this->rim = $rim;
        $this->tire = $tire;
    }

    public function width() {
        return $this->rim + ($this->tire * 2);
    }
}