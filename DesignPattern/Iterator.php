<?php

class AlphabeticalOrderIterator implements \Iterator
{
    public function __construct(
        private mixed $collection,
        private int $position = 0,
        private bool $reverse = false,
    ) {}

    public function rewind(): void
    {
        $this->position = $this->reverse ? count($this->collection->getItems()) - 1 : 0;
    }

    public function current(): mixed
    {
        return $this->collection->getItems()[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    public function valid(): bool
    {
        return isset($this->collection->getItems()[$this->position]);
    }
}

class WordCollection implements \IteratorAggregate
{
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(mixed $item): void
    {
        $this->items[] = $item;
    }

    public function getIterator(): Iterator
    {
        return new AlphabeticalOrderIterator($this);
    }

    public function getReverseIterator(): Iterator
    {
        return new AlphabeticalOrderIterator($this);
    }
}

$collection = new WordCollection();
$collection->addItem("First");
$collection->addItem("Second");
$collection->addItem("Third");

echo "Straight traversal:\n";
foreach($collection->getIterator() as $item) {
    echo $item . "\n";
}

echo "\n";
echo "Reverse traversal:\n";
foreach ($collection->getReverseIterator() as $item) {
    echo $item . "\n";
}