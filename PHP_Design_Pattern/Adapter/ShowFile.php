<?php

namespace Adapter;

use Exception;

class ShowFile
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        if(!is_readable($fileName)) {
            throw new Exception("file " . $fileName . " is not readable !");
        }
        $this->fileName = $fileName;
    }

    protected  function showPlain(): void
    {
        $contents = file_get_contents($this->fileName);
        echo $contents;
    }

    protected function showHighlight(): void
    {
        highlight_file($this->fileName);
    }
}