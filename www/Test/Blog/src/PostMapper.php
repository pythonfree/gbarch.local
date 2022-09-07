<?php

namespace Test\Blog;

use Exception;
use PDO;
use stringEncode\Encode;

class PostMapper
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    /**
     * @param string $urlKey
     * @return array|null
     */
    public function getByUrlKey(string $urlKey): ?array
    {
        $statement = $this->connection->prepare('SELECT * FROM post WHERE url_key = :url_key');
        $statement->execute([
            'url_key' => $urlKey
        ]);
        $result = $statement->fetchAll();
        return array_shift($result);
    }

    /**
     * @param string $direction
     * @return array|null
     * @throws Exception
     */
    public function getList(string $direction = 'DESC'): ?array
    {
        if (!in_array($direction, ['DESC', 'ASC'])) {
            throw new \InvalidArgumentException("The direction - \"{$direction}\" is not supported.");
        }
        $statement = $this->connection->prepare('SELECT * FROM post ORDER BY published_date ' . $direction);
        $statement->execute();
        return $statement->fetchAll();
    }

}