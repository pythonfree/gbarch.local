<?php

namespace Blog;

class LatestPosts
{
    /**
     * @var DataBase
     */
    private DataBase $dataBase;

    /**
     * @param DataBase $dataBase
     */
    public function __construct(DataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }

    /**
     * @param int $limit
     * @return array|null
     */
    public function get(int $limit): ?array
    {
        $statement = $this->dataBase->getConnection()->prepare('SELECT * FROM post ORDER BY published_date LIMIT ' . $limit);
        $statement->execute();
        return $statement->fetchAll();
    }

}