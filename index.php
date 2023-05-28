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
// require "Module/Schedule.php";
// require "Module/Bicycle.php";
// require "Module/Vehicle.php";
// require "Module/Mechanic.php";

// use Module\Bicycle;
// use Module\Vehicle;
// use Module\Mechanic;

// $starting = "2023/09/04";
// $ending = "2023/09/10";

// $b = new Bicycle();
// var_dump($b->schedulable($starting, $ending));

// $v = new Vehicle();
// var_dump($v->schedulable($starting, $ending));

// $m = new Mechanic();
// var_dump($m->schedulable($starting, $ending));

/**
 * 第8章
 */
// require "Components/Bicycle.php";
// require "Components/Parts.php";
// require "Components/Part.php";
// require "Components/RoadBikeParts.php";
// require "Components/MountainBikeParts.php";

// require "Components/config.php";
// require "Components/PartsFactory.php";

// use Components\Bicycle;
// use Components\Parts;
// use Components\Part;
// use Components\PartsFactory;

// $chain = new Part(["name" => "chain", "description" => "10-speed"]);
// $road_tire = new Part(["name" => "tire_size", "description" => "23"]);
// $tape = new Part(["name" => "tape_color", "description" => "red"]);
// $mountain_tire = new Part(["name" => "tire_size", "description" => "2.1"]);
// $rear_shock = new Part(["name" => "rear_shock", "description" => "Fox"]);
// $front_shock = new Part(["name" => "front_shock", "description" => "Manitou", "needs_spare" => false]);

// $road_bike = new Bicycle([
//     "size" => "L",
//     "parts" => new Parts([$chain, $road_tire, $tape]),
// ]);

// $mountain_bike = new Bicycle([
//     "size" => "S",
//     "parts" => new Parts([$chain, $mountain_tire, $front_shock, $rear_shock]),
// ]);

// var_dump($road_bike->spares());
// var_dump($mountain_bike->spares());

// $parts_factory = new PartsFactory();
// $road_bike = new Bicycle([
//     "size" => "L",
//     "parts" => $parts_factory->build($road_config),
// ]);
// $mountain_bike = new Bicycle([
//     "size" => "S",
//     "parts" => $parts_factory->build($mountain_config),
// ]);
// $recumbent_bike = new Bicycle([
//     "size" => "S",
//     "parts" => $parts_factory->build($recumbent_config),
// ]);

// var_dump($road_bike->spares());
// var_dump($mountain_bike->spares());
// var_dump($recumbent_bike->spares());