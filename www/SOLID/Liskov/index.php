<?php

class User extends BaseUser implements HasStatusInterface
{
    /**
     * @var string
     */
    private string $status;

    /**
     * @param string $name
     * @param string $status
     */
    public function __construct(string $name, string $status)
    {
        parent::__construct($name);
        $this->status = $status;
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

class Guest extends BaseUser
{
    public function __construct()
    {
        parent::__construct('Guest');
    }
}

class BaseUser
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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

}

interface HasStatusInterface
{
    /**
     * @return mixed
     */
    public function getStatus();

    /**
     * @param string $status
     * @return mixed
     */
    public function changeStatus(string $status);
}

$user = new User('Ivan', 'auth');
$guest = new Guest();
$baseUser = new BaseUser('Ivan'); // то же работает - L
