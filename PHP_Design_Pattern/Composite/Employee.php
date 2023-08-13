<?php

namespace Composite;

use Exception;

class Employee extends OrganizationEntry
{
    public function __construct(
        string $code,
        string $name,
    ) {}

    public function add(OrganizationEntry $entry): void
    {
        throw new Exception("method not allowed");
    }
}