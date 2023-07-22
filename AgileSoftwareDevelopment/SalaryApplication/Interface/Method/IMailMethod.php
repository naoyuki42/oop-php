<?php

namespace SalaryApplication\Interface;

interface IMailMethod
{
    public function getAddress(): string;
    public function pay(IPayCheck $pc): void;
}