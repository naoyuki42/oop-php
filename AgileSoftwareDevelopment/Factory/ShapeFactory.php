<?php

namespace Factory;

use Error;
use Factory\Interface\IShape;
use Factory\Interface\IShapeFactory;

class ShapeFactory implements IShapeFactory
{
    public function make(string $shapeName): IShape
    {
        $shape = match($shapeName) {
            "Circle" => new Circle(),
            "Square" => new Square(),
            default => throw new Error("ShapeFactory cannot create" . $shapeName),
        };
        return $shape;
    }
}