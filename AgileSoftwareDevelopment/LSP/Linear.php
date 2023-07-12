<?php

abstract class LinearObject
{
    protected Point $itsP1;
    protected Point $itsP2;

    public function __construct(Point $p1, Point $p2) {
        $this->itsP1 = $p1;
        $this->itsP2 = $p2;
    }

    abstract public function isOn(Point $point): bool;

    public function getIntercept(): float
    {
        $y0 = $this->getP1()->y - $this->getSlope() * $this->getP1()->x;
        return $y0;
    }

    public function getSlope(): float
    {
        $slope = ($this->getP1()->x - $this->getP2()->x) / ($this->getP1()->y - $this->getP2()->y);
        return $slope;
    }

    private function getP1(): Point
    {
        return $itsP1;
    }

    private function getP2(): Point
    {
        return $itsP2;
    }
}

abstract class Line extends LinearObject
{
    public function __construct(Point $p1, Point $p2) {
        parent::__construct($p1, $p2);
    }
}

abstract class LineSegment extends LinearObject
{
    public function __construct(Point $p1, Point $p2) {
        parent::__construct($p1, $p2);
    }

    abstract public function getLength(): float;
}

abstract class Ray extends LinearObject
{
    public function __construct(Point $p1, Point $p2) {
        parent::__construct($p1, $p2);
    }
}