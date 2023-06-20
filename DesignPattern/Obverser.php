<?php

interface ObservableInterface
{
    public function addObserver(string $eventKey, callable $observer): void;
}

trait NotifiabaleTrait
{
    protected $observerMap = [];

    public function addObserver(string $eventKey, callable $observer): void
    {
        $this->observerMap[$eventKey][] = $observer;
    }

    protected function notify(string $eventKey, mixed $data): void
    {
        $observers = $this->observersMap[$eventKey];
        foreach($observers as $observer) {
            $observer($data);
        }
    }
}

class DataStore implements ObservableInterface
{
    const EVENT_SAVE = "save";
    const EVENT_LOAD = "load";

    use NotifiableTrait;

    public function save(mixed $data)
    {
        // データを保存する処理
        $this->notify(self::EVENT_SAVE, $data);
    }

    public function load(mixed $data): mixed
    {
        // データを読み込む処理
        $this->notify(self::EVENT_LOAD, $data);
        return $data;
    }
}

class LoggingObserver
{
    public function __construct(
        protected LoggerInterface $logger
    ) {}

    public function watch(ObservableInterface $target, string $eventKey): void
    {
        $target->addObserver($eventKey, function($data) use($eventKey) {
            $this->logger->info($eventKey . ": " . json_encode($data));
        });
    }
}

$dataStore = new DataStore();

$observer = new LoggingObserver();
$observer->watch($dataStore, DataStore::EVENT_SAVE);
$observer->watch($dataStore, DataStore::EVENT_LOAD);

$dataStore->save($data);