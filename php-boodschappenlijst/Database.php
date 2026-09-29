<?php

class Database
{
    public $connection;
    // Check username en password if no connection,
    //   anders moet je extention=PDO_MYSQL uncommenten in (C:\php\)php.ini, copy php-development.ini en rename naar php.ini if needed.
    public function __construct($config, $username = "root", $password = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}