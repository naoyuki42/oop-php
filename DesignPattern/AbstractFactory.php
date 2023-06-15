<?php

abstract class Pet {}

class Cat extends Pet {}
class Dog extends Pet {}

interface PetShopInterface
{
    public function createPet(string $type): Pet;
}

class CatAndDogOnlyPetShop implements PetShopInterface
{
    public function createPet(string $type): Pet
    {
        return match($type) {
            "cat" => new Cat(),
            "dog" => new Dog(),
            default => throw new InvalidArgumentException(),
        };
    }
}

class PetBuyer
{
    public function buyPet(PetShopInterface $petShot, string $type)
    {
        $pet = $petShot->createPet($type);
        buy($pet);
    }

    private function buy(Pet $pet) {}
}
