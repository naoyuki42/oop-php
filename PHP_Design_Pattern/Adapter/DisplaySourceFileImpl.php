<?php

namespace Adapter;

class DisplaySourceFileImpl extends ShowFile implements DisplaySourceFile
{
    public function __construct($fileName)
    {
        parent::__construct($fileName);
    }

    public function display(): void
    {
        parent::showHighlight();
    }
}
