<?php

namespace SalaryApplication\Interface;

interface ITimeCard
{
    public function getDate(): string;
    public function getHours(): string;
}