<?php

namespace SalaryApplication\Interface;

interface ITimeCard extends ISalary
{
    public function getHours(): string;
}