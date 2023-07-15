<?php

interface Command
{
    public function execute(): void;
}

class ActiveObjectEngine
{
    private array $itsCommands = [];

    public function addCommand(Command $c): void
    {
        $this->itsCommands[] = $c;
    }

    public function run(): void
    {
        while(!empty($this->itsCommands)) {
            $c = $this->itsCommands[0];
            array_shift($this->itsCommands);
            $c->execute();
        }
    }
}