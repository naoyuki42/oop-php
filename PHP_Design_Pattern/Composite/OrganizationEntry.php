<?php

namespace Composite;

abstract class OrganizationEntry
{
    public function __construct(
        private string $code,
        private string $name,
    ) {}

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public abstract function add(OrganizationEntry $entry): void;

    public function dump(): string
    {
        return $this->code . ":" . $this->name . "\n";
    }
}