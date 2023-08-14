<?php

namespace Decorator;

class UpperCaseText extends TextDecorator
{
    public function __construct(Text $target)
    {
        parent::__construct($target);
    }

    public function getText(): ?string
    {
        $str = parent::getText();
        $str = strtoupper($str);
        return $str;
    }
}