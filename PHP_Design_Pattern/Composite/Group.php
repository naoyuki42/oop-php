<?php

namespace Composite;

class Group extends OrganizationEntry
{
    private array $entries;

    public function __construct(
        string $code,
        string $name
    ) {
        parent::__construct($code, $name);
    }

    public function add(OrganizationEntry $entry): void
    {
        $this->entries[] = $entry;
    }

    public function dump(): string
    {
        $message = parent::dump();
        foreach($this->entries as $entry) {
            $message .= $entry->dump();
        }
        return $message;
    }
}