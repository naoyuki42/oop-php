<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Entity\PaymentClassification;
use SalaryApplication\Entity\PaymentSchedule;
use SalaryApplication\Entity\PaymentMethod;
use SalaryApplication\Interface\IEmployee;
use SalaryApplication\Interface\IAffiliation;

class Employee implements IEmployee
{
    function __construct(
        private int $empId,
        private string $name,
        private string $address,
        private ?PaymentClassification $class = null,
        private ?PaymentSchedule $schedule = null,
        private ?PaymentMethod $method = null,
        private ?IAffiliation $charge = null,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getClassification(): PaymentClassification
    {
        return $this->class;
    }

    public function getSchedule(): PaymentSchedule
    {
        return $this->schedule;
    }

    public function getMethod(): PaymentMethod
    {
        return $this->method;
    }

    public function getAffiliation(): IAffiliation
    {
        return $this->charge;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setClassification(PaymentClassification $class): void
    {
        $this->class = $class;
    }

    public function setSchedule(PaymentSchedule $schedule): void
    {
        $this->schedule = $schedule;
    }

    public function setMethod(PaymentMethod $method): void
    {
        $this->method = $method;
    }

    public function setAffiliation(IAffiliation $affiliation): void
    {
        $this->charge = $affiliation;
    }

    public function isPayDate($date): bool
    {
        return $this->schedule->isPayDate($date);
    }
}