<?php

namespace Decorator;

interface Text
{
    public function getText(): ?string;
    public function setText(string $str): void;
}