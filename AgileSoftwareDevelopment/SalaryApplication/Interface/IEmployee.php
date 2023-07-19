<?php

namespace SalaryApplication\Interface;

use SalaryApplication\Entity\PaymentClassification;
use SalaryApplication\Entity\PaymentSchedule;

interface IEmployee
{
    public function getName(): string;
    public function getClassification(): PaymentClassification;
    public function getSchedule(): PaymentSchedule;
    public function getMethod(): IMethod;
    public function setClassification(PaymentClassification $class): void;
    public function setSchedule(PaymentSchedule $schedule): void;
    public function setMethod(IMethod $method): void;
}