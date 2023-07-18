<?php

namespace SalaryApplication\Interface;

use SalaryApplication\Entity\Classification;
use SalaryApplication\Entity\Schedule;
use SalaryApplication\Entity\Method;

interface IEmployee
{
    public function getName(): string;
    public function getClassification(): Classification;
    public function getSchedule(): Schedule;
    public function getMethod(): Method;
}