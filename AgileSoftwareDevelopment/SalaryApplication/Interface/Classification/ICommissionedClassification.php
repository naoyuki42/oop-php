<?php

namespace SalaryApplication\Interface;

interface ICommissionedClassification
{
    public function getSalary(): int;
    public function getCommissionRate(): float;
    public function getSalesReceipt(string $date): ?ISalesReceipt;
    public function addSalesReceipt(ISalesReceipt $salesReceipt): void;
}