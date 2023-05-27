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
// require "Extends/Bicycle.php";
// require "Extends/RoadBike.php";
// require "Extends/MountainBike.php";
// require "Extends/RecumbentBike.php";

// use Extends\RoadBike;
// use Extends\MountainBike;
// use Extends\RecumbentBike;

// $road_bike = new RoadBike(["size" => "M", "tape_color" => "red"]);
// var_dump($road_bike->spares());

// $mountain_bike = new MountainBike(["size" => "S", "front_shock" => "Manitou", "rear_shock" => "Fox"]);
// var_dump($mountain_bike->spares());

// $recumbent_bike = new RecumbentBike(["flag" => "tail and orange"]);
// var_dump($recumbent_bike->spares());

/**
 * 第7章
 */
require "Module/Schedule.php";
require "Module/Bicycle.php";
require "Module/Vehicle.php";
require "Module/Mechanic.php";

use Module\Bicycle;
use Module\Vehicle;
use Module\Mechanic;

$starting = "2023/09/04";
$ending = "2023/09/10";

$b = new Bicycle();
var_dump($b->schedulable($starting, $ending));

$v = new Vehicle();
var_dump($v->schedulable($starting, $ending));

$m = new Mechanic();
var_dump($m->schedulable($starting, $ending));
