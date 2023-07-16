<?php

class ApplicationRunner
{
    public function __construct(
        private Application $itsApplication = null,
    ) {}

    public function run(): void
    {
        $this->itsApplication->init();
        while(!$this->itsApplication->done()) {
            $this->itsApplication->idle();
        }
        $this->itsApplication->cleanUp();
    }
}

interface Application
{
    public function init(): void;
    public function idle(): void;
    public function cleanUp(): void;
    public function done(): bool;
}

class ftocStrategy implements Application
{
    private InputStreamReader $isr;
    private BufferedReader $br;
    private bool $isDone = false;

    public static function main(): void
    {
        $strategy = new ftocStrategy();
        $appRunner = new ApplicationRunner($strategy);
        $appRunner->run();
    }

    public function init(): void {
        $this->isr = new InputStreamReader();
        $this->br = new BufferedReader($this->isr);
    }

    public function idle(): void {
        $fahrString = $this->readLineAndReturnNullIfError();
        if($fahrString == null || mb_strlen($fahrString) == 0) {
            $this->isDone = true;
        } else {
            $fahr = (float)$fahrString;
            $celsius = 5.0 / 9.0 * ($fahr - 32);
            printf("F={$fahr} C={$celsius}");
        }
    }

    public function cleanUp(): void {
        printf("ftoc exit");
    }

    public function done(): bool {
        return $this->isDone;
    }

    private function readLineAndReturnNullIfError(): string
    {
        $s = "";
        try {
            $s = $this->br->readLine();
        } catch(Error $e) {
            $s = null;
        }
        return $s;
    }
}

interface InputStreamReader{}
interface BufferedReader
{
    public function readLine(): string;
}