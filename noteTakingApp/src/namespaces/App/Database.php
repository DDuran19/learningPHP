<?php

namespace App;

class Database
{
    private $connection;
    private $statement;
    public function __construct($username = 'root', $password = '')
    {
        $config = requireConstants("config.php")['database'];
        $configString = http_build_query($config, '', ';');
        $dsn = "mysql:$configString";
        $this->connection = new \PDO($dsn, $username, $password, [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        $this->statement = $statement;
        return $this;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function insert($query, $params = [])
    {
        try {

            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            $this->statement = $statement;
            return $this->connection->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
            return Router::abort(500);
        }
    }
    public function update($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $result = $statement->execute($params);
            $this->statement = $statement;
            return $result;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return Router::abort(500);
        }
    }
    public function delete($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        $this->statement = $statement;
        return $this;
    }
    public function findOrFail($code = 404)
    {
        $result = $this->fetch();
        if (!$result) {
            return Router::abort($code);
        }
        return $result;
    }
}
