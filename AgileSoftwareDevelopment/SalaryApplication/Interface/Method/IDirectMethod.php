<?php

namespace SalaryApplication\Interface;

use SalaryApplication\Interface\IPayCheck;

interface IDirectMethod {
    public function getBank(): string;
    public function getAccount(): int;
    public function pay(IPayCheck $pc): void;
}