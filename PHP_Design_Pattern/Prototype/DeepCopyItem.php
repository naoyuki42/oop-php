<?php

namespace Prototype;

class DeepCopyItem extends ItemPrototype
{
    protected function __clone(): void
    {
        $this->setDetail(clone $this->getDetail());
    }
}