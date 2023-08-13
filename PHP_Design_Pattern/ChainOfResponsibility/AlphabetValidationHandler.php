<?php

namespace ChainOfResponsibility;

class AlphabetValidationHandler extends ValidatorHandler
{
    protected function execValidation($input): bool
    {
        return preg_match("/^[a-z]*$/i", $input);
    }

    protected function getErrorMessage(): string
    {
        return "半角英字で入力してください";
    }
}