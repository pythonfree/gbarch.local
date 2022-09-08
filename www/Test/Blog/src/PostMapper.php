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
    private PDO $connection;

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
     * @param int $page
     * @param int $limit
     * @param string $direction
     * @return array|null
     */
    public function getList(int $page = 1, int $limit = 2, string $direction = 'DESC'): ?array
    {
        if (!in_array($direction, ['DESC', 'ASC'])) {
            throw new \InvalidArgumentException("The direction - \"{$direction}\" is not supported.");
        }
        $start = ($page - 1) * $limit;
        $start = max($start, 0);

        $end = $this->connection->query('SELECT * FROM post')->rowCount();
        if ($start >= $end) {
            $start = $end - $limit;
        }

        $sql = 'SELECT * FROM post ORDER BY published_date ' . $direction . ' LIMIT ' . $start . ',' . $limit;
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        $statement = $this->connection->prepare('SELECT count(post_id) as total FROM post');
        $statement->execute();
        return (int)($statement->fetchColumn() ?? 0);
    }

}