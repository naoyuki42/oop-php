<?php

namespace Factory\Interface;

interface IShapeFactory
{
    public function make(string $shapeName): IShape;
}