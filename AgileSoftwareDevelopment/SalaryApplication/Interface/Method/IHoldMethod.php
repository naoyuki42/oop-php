<?php

namespace SalaryApplication\Interface;

interface IHoldMethod {
    public function getAddress(): string;
    public function pay(IPayCheck $pc): void;
}