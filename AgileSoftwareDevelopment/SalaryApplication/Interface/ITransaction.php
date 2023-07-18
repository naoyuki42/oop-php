<?php

namespace SalaryApplication\Interface;

interface ITransaction
{
    public function execute(): void;
}