<?php

namespace SalaryApplication\Interface;

interface IEmployee
{
    public function getName(): string;
    public function getClassification(): IClassification;
    public function getSchedule(): ISchedule;
    public function getMethod(): IMethod;
}