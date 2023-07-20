<?php

namespace SalaryApplication\Interface;

interface IDirectMethod {
    public function getBank(): string;
    public function getAccount(): int;
}