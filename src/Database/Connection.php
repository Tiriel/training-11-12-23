<?php

namespace App\Database;

use PDO;
use PDOException;

class Connection
{
    private static ?Connection $instance = null;
    private string $host = '127.0.0.1';
    private string $dbname = 'oop_php';
    private string $username = 'admin';
    private string $password = 'admin';
    private PDO $conn;

    private function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance(): Connection
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }
}
