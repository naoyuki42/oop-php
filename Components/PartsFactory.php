<?php

namespace Components;

class PartsFactory {
    public function build($config) {
        return new Parts(array_map(function($part_config) {
            return new Part([
                "name" => $part_config[0],
                "description" => $part_config[1],
                "needs_spare" => $part_config[2] ?? true,
            ]);
        }, $config));
    }
}