<?php

interface PrizeItemInterface
{
    public function getMaterial(): Material;
    public function getShape(): Shape;
}

abstract class PrizeMaterial
{
    abstract public function get(): Material;
}

abstract class PrizeShape
{
    abstract public function get(): Shape;
}

class PrizeItem implements PrizeItemInterface
{
    public function __construct(
        protected PrizeMaterial $material,
        protected PrizeShape $shape,
    ) {}

    public function getMaterial(): Material
    {
        return $this->material->get();
    }

    public function getShape(): Shape
    {
        return $this->shape->get();
    }
}

class PrizeMaterialGold extends PrizeMaterial {};
class PrizeMaterialSilver extends PrizeMaterial {};
class PrizeMaterialBronze extends PrizeMaterial {};

class PrizeShapeMedal extends PrizeShape {};
class PrizeShapeCup extends PrizeShape {};

$goldMedal = new PrizeItem(
    new PrizeMaterialGold(),
    new PrizeShapeMedal(),
);

$silverMedal = new PrizeItem(
    new PrizeMaterialSilver(),
    new PrizeShapeCup(),
);