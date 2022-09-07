<?php

namespace Observer\Entity;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class User implements SplSubject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var SplObjectStorage[]
     */
    private $observers;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->observers = new SplObjectStorage();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function changeName(string $name): void
    {
        $this->name = $name;
        $this->notify();
    }

    /**
     * @inheritDoc
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @inheritDoc
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * @inheritDoc
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}