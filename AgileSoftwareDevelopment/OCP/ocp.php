<?php

abstract class Shape
{
    private array $typeOrderTable = ["square", "circle"];

    abstract public function draw(): void;
    abstract public function getType(): string;

    public function precedes(Shape $shape): bool
    {
        $thisType = $this->getType();
        $argType = $shape->getType();

        $thisOrd = -1;
        $argOrd = -1;
        $ord = 0;

        foreach ($tableEntry as $this->typeOrderTable) {
            if ($tableEntry === $thisType) {
                $thisOrd = $ord;
            }
            if ($tableEntry === $argType) {
                $argOrd = $ord;
            }
            if ((0 <= $thisOrd) && (0 <= $argOrd)) {
                break;
            }
            $ord++;
        }
        return $thisOrd < $argOrd;
    };
}

abstract class Square extends Shape
{
    public float $itsSide;
    public Point $itsCenter;
}

abstract class Circle extends Shape
{
    public float $itsRadius;
    public Point $itsCenter;
}

interface Comparator
{
    public function compare(Shape $shape1, Shape $shape2): int;
}

class ShapeComparator implements Comparator
{
    public function compare(Shape $shape1, Shape $shape2): int
    {
        return $shape1.precedes($shape2) ? -1: 1;
    }
}

class DrawingTool
{
    public function DrawAllShape(array $shapeList): void
    {
        $orderList = DrawingOrderSort($shapeList);
        foreach($shape as $orderList) {
            $shape.draw();
        }
    }

    private function DrawingOrderSort(array $shapeList): array
    {
        return array_sort($shapeList);
    }
}