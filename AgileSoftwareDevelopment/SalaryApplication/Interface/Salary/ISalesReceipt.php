<?php

namespace SalaryApplication\Interface;

interface ISalesReceipt
{
    public function getDate(): string;
    public function getAmount(): int;
}