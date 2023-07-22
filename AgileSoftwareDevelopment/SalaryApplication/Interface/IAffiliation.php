<?php

namespace SalaryApplication\Interface;

interface IAffiliation
{
    public function getServiceCharge(string $date): ?int;
    public function getDues(): int;
    public function getMemberId(): int;
    public function addServiceCharge(string $date, int $charge): void;
    public function calculateDeductions(IPayCheck $payCheck): float;
}