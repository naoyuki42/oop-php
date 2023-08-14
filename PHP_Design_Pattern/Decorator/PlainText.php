<?php

namespace Decorator;

class PlainText implements Text
{
    private ?string $textString = null;

    public function getText(): ?string
    {
        return $this->textString;
    }

    public function setText(string $str): void
    {
        $this->textString = $str;
    }
}