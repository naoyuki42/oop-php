<?php

namespace ChainOfResponsibility;

$handler = new AlphabetValidationHandler();
$result = $handler->validate("あいうえお");