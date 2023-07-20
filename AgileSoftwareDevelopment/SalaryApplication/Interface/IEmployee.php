<?php

namespace SalaryApplication\Interface;

use SalaryApplication\Entity\PaymentClassification;
use SalaryApplication\Entity\PaymentSchedule;
use SalaryApplication\Entity\PaymentMethod;
use SalaryApplication\Interface\IAffiliation;

interface IEmployee
{
    public function getName(): string;
    public function getClassification(): PaymentClassification;
    public function getSchedule(): PaymentSchedule;
    public function getMethod(): PaymentMethod;
    public function getAffiliation(): IAffiliation;
    public function setName(string $name): void;
    public function setClassification(PaymentClassification $class): void;
    public function setSchedule(PaymentSchedule $schedule): void;
    public function setMethod(PaymentMethod $method): void;
    public function setAffiliation(IAffiliation $affiliation): void;
}