<?php

namespace ChainOfResponsibility;

abstract class ValidatorHandler
{
    private ValidatorHandler $nextHandler = null;

    public function setHandler(ValidatorHandler $handler): ValidatorHandler
    {
        $this->nextHandler = $handler;
        return $this;
    }

    public function getNextHandler(): ?ValidatorHandler
    {
        return $this->nextHandler;
    }

    public function validate($input): string | bool
    {
        $result = $this->execValidation($input);

        if(!$result) {
            return $this->getErrorMessage();
        }

        if($this->getNextHandler() !== null) {
            return $this->getNextHandler()->validate($input);
        }

        return true;
    }

    protected abstract function execValidation($input): bool;

    protected abstract function getErrorMessage(): string;
}