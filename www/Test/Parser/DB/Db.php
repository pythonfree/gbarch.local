<?php

class Db
{
    private $connection;

    public function __construct($host, $user, $password, $db)
    {
        $this->connection = new mysqli($host, $user, $password, $db);
        $this->query('SET NAMES UTF8');

        if (mysqli_connect_error()) {
            throw new Exception('Can\'t connect to DB: ' . $db);
        }
    }

    public function query($sql)
    {
        if (!$this->connection) {
            return false;
        }

        $result = $this->connection->query($sql);

        if (mysqli_error($this->connection)) {
            throw new Exception(mysqli_error($this->connection));
        }

        if (is_bool($result)) {
            return $result;
        }

        return $result->fetch_assoc();
    }

    public function escape($str)
    {
        return mysqli_escape_string($this->connection, $str);
    }

    public function insertedId()
    {
        return mysqli_insert_id($this->connection);
    }

}