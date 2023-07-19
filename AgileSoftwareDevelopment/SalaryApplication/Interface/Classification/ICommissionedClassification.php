<?php

namespace SalaryApplication\Interface;

interface ICommissionedClassification
{
    public function getSalary(): int;
    public function getCommissionRate(): float;
}