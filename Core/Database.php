<?php

namespace Core;

use PDO;

/**
 *
 */
class Database {
    public $connection;
    public $statement;

    public function __construct($cfg, $username = 'root', $password = '') {

        $dsn = 'sqlite' . http_build_query($cfg, '', ';');

        $dsn = "sqlite:../db.sqlite";

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    /**
     * @return array|false
     */
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }
}
