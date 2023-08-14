<?php

namespace Decorator;

class DoubleByteText extends TextDecorator
{
    public function __construct(Text $target)
    {
        parent::__construct($target);
    }

    public function getText(): ?string
    {
        $str = parent::getText();
        $str = mb_convert_kana($str, "KV");
        return $str;
    }
}