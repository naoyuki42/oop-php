<?php

interface CommandInterface
{
    public function invoke(): void;
}

class SelectionItem
{
    public function __construct(
        public string $label,
        public CommandInterface $command,
    ) {}
}

class SelectionUI
{
    protected array $selectionItems = [];

    public function registerCommand(
        string $label,
        CommandInterface $command,
    ): void {
        $this->selectionItems[] = new SelectionItem($label, $command);
    }

    public function help(): string
    {
        $indexedItemList = [];
        foreach($this->selectionItems as $i => $item) {
            $indexedItemList[] = sprintf("%d: %s", $i + 1, $item->label);
        }
        return implode("\n", $indexedItemList);
    }

    public function select(int $number): void
    {
        $command = $this->selectionItems[$number - 1]->command;
        $command->invoke();
    }
}


class PetShop {}
abstract class Pet {}
class Cat extends Pet {}
class Dog extends Pet {}

class BuyPetCommand implements CommandInterface
{
    public function __construct(
        protected PetShop $shop,
        protected Pet $pet,
    ) {}

    public function invoke(): void {
        // 購入の処理
    }
}

class CancelBuyingCommand implements CommandInterface
{
    public function __construct(
        protected PetShop $shop,
    ) {}

    public function invoke(): void {
        // キャンセルの処理
    }
}


function createPetSelectionUI(PetShop $shop): SelectionUI
{
    $ui = new SelectionUI();
    $ui->registerCommand("猫をください", new BuyPetCommand($shop, new Cat()));
    $ui->registerCommand("犬をください", new BuyPetCommand($shop, new Dog()));
    $ui->registerCommand("やっぱりやめます", new CancelBuyingCommand($shop));
    return $ui;
}

$shop = new PetShop();
$ui = createPetSelectionUI($shop);
echo $ui->help() . "\n";

$userInput = (int)fgets(STDIN);
$ui->select($userInput);