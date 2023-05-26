<?php

/**
 * 第2章
 */
// require "SRP/Gear.php";
// require "SRP/Wheel.php";

// $wheel = new Wheel(26, 1.5);
// echo "circumference:{$wheel->circumference()}\n";

// $gear = new Gear(52, 11, $wheel);
// echo "gear_inches:{$gear->gear_inches()}\n";
// echo "ratio:{$gear->ratio()}\n";

/**
 * 第3章
 */
// require "DI/Wheel.php";

// $wheel = new Wheel(26, 1.5, 52, 11);
// echo "gear_inches:{$wheel->gear_inches()}\n";

/**
 * 第6章
 */
require "Extends/Bicycle.php";
require "Extends/RoadBike.php";
require "Extends/MountainBike.php";
require "Extends/RecumbentBike.php";

use Extends\RoadBike;
use Extends\MountainBike;
use Extends\RecumbentBike;

$road_bike = new RoadBike(["size" => "M", "tape_color" => "red"]);
var_dump($road_bike->spares());

$mountain_bike = new MountainBike(["size" => "S", "front_shock" => "Manitou", "rear_shock" => "Fox"]);
var_dump($mountain_bike->spares());

$recumbent_bike = new RecumbentBike(["flag" => "tail and orange"]);
var_dump($recumbent_bike->spares());