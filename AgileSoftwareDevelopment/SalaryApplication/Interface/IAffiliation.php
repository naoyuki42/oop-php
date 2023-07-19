<?php

namespace SalaryApplication\Interface;

interface IAffiliation
{
    public function getServiceCharge(string $date): ?int;
    public function addServiceCharge(string $date, int $charge): void;
}