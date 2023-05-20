<?php

class Wheel {
    private int $rim;
    private float $tire;

    function __construct(int $rim, float $tire) {
        $this->rim = $rim;
        $this->tire = $tire;
    }

    private function rim(): int {
        return $this->rim;
    }
    private function tire(): float {
        return $this->tire;
    }

    public function diameter(): float {
        return $this->rim() + ($this->tire() * 2);
    }

    public function circumference() {
        return $this->diameter() * pi();
    }
}