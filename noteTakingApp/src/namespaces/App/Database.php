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

    public function findOrFail($code = 404)
    {
        return $this->fetch() ?: abort($code);
    }
}
