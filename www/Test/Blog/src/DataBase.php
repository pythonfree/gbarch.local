<?php

namespace Test\Blog;

use InvalidArgumentException;
use PDO;
use PDOException;

class DataBase
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * @param string|null $dsn
     * @param string|null $username
     * @param string|null $password
     */
    public function __construct(string $dsn = null, string $username = null, string $password = null)
    {
        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }

}