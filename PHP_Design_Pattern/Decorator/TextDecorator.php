<?php

namespace Decorator;

abstract class TextDecorator implements Text
{
    public function __construct(
        private Text $text,
    ) {}

    public function getText(): ?string
    {
        return $this->text->getText();
    }

    public function setText(string $str): void
    {
        $this->text->setText($str);
    }
}