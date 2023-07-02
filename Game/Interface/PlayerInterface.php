<?php

namespace Game\Interface;

interface PlayerInterface
{
    public function getHand(): string;
    public function getName(): string;
}