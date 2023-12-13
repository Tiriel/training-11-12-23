<?php

namespace App\Database;

class Connection
{
    protected static $connection;

    public static function getPdo(): \PDO
    {
        if (!static::$connection) {
            try {
                static::$connection = new \PDO("mysql:host=127.0.0.1:3306;dbname=oop_php", 'admin', 'admin');
                static::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo 'Connection failed : '.$e->getMessage();
            }
        }

        return static::$connection;
    }
}