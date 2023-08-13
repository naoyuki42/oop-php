<?php

namespace Composite;

$root_entry = new Group("001", "本社");
$root_entry->add(new Employee("00101", "CEO"));
$root_entry->add(new Employee("00102", "CTO"));

$group1 = new Group("010", "札幌支店");
$group1->add(new Employee("010001", "支店長"));
$group1->add(new Employee("010002", "佐々木"));
$root_entry->add($group1);

$root_entry->dump();