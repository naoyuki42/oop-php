<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Entity\PaymentClassification;
use SalaryApplication\Entity\PaymentSchedule;
use SalaryApplication\Interface\IEmployee;
use SalaryApplication\Interface\IMethod;

class Employee implements IEmployee
{
    function __construct(
        private int $empId,
        private string $name,
        private string $address,
        private ?PaymentClassification $class = null,
        private ?PaymentSchedule $schedule = null,
        private ?IMethod $method = null,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getClassification(): PaymentClassification
    {
        return $this->class;
    }

    public function getSchedule(): PaymentSchedule
    {
        return $this->schedule;
    }

    public function getMethod(): IMethod
    {
        return $this->method;
    }

    public function setClassification(PaymentClassification $class): void
    {
        $this->class = $class;
    }

    public function setSchedule(PaymentSchedule $schedule): void
    {
        $this->schedule = $schedule;
    }

    public function setMethod(IMethod $method): void
    {
        $this->method = $method;
    }
}