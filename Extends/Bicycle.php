<?php

class Bicycle {
    public string $style;
    public string $size;
    public string $front_shock;
    public string $rear_shock;

    function __construct(
        string $style,
        string $size,
        string $front_shock,
        string $rear_shock
    ) {
        $this->style = $style;
        $this->size = $size;
        $this->front_shock = $front_shock;
        $this->rear_shock = $rear_shock;
    }

    public function spares(): array {
        $spares = [];
        if ($this->style === "road") {
            $spares = [
                "chain" => "10-speed",
                "tire_size" => "23", // ミリメートル
                "tape_color" => $this->tape_color,
            ];
        } else {
            $spares = [
                "chain" => "10-speed",
                "tire_size" => "2.1", // インチ
                "rear_shock" => $this->rear_shock,
            ];
        }
        return $spares;
    }
}