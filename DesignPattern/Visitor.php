<?php

interface VisitableInterface
{
    abstract public function accept(callable $visitor): void;
}

class Node implements VisitableInterface
{
    public function accept(callable $visitor): void
    {
        $visitor($this);
    }
}

class Branch extends Node
{
    protected array $children;

    public function accept(callable $visitor): void
    {
        parent::accept($visitor);

        foreach($this->children as $child) {
            $child->accept($visitor);
        }
    }
}