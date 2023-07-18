<?php

namespace SalaryApplication\Interface;

interface IEmployee
{
    public function getName(): string;
    public function getClassification(): IClassification;
    public function getSchedule(): ISchedule;
    public function getMethod(): IMethod;
    public function setClassification(IClassification $class): void;
    public function setSchedule(ISchedule $schedule): void;
    public function setMethod(IMethod $method): void;
}