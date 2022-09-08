<?php

namespace Test\Blog;

use PDO;

class LatestsPost
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param int $limit
     * @return array|null
     */
    public function get(int $limit): ?array
    {
        $statement = $this->connection->prepare('SELECT * FROM post ORDER BY published_date LIMIT ' . $limit);
        $statement->execute();
        return $statement->fetchAll();
    }

}