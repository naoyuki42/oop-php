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
require "DI/Wheel.php";

$wheel = new Wheel(26, 1.5, 52, 11);
echo "gear_inches:{$wheel->gear_inches()}\n";