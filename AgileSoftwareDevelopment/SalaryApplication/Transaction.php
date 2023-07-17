<?php

namespace SalaryApplication;

interface Transaction
{
    public function execute(): void;
}