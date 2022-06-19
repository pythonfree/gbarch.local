<?php

class User
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $status;

    /**
     * @param string $name
     * @param string $status
     */
    public function __construct(string $name, string $status)
    {
        $this->name = $name;
        $this->status = $status;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }


    /**
     * @param string $status
     * @return void
     */
    public function changeStatus(string $status)
    {
        $this->status = $status;
    }
}

class Guest extends User
{
    public function __construct()
    {
        parent::__construct('Guest', 'Guest');
    }

    public function changeStatus(string $status)
    {
        throw new LogicException("Can't change status of guest.");
    }
}

$user = new User('Ivan', 'auth');
$guest = new Guest();
$guest->changeStatus('not guest');