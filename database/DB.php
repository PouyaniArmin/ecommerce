<?php

namespace Database;

use Core\Application;
use Dotenv\Dotenv;
use PDO;
use PDOException;
use Throwable;

class DB extends Query
{
    private $server;
    private $password;
    private $username;
    private $dbname;
    private PDO $conn;
    public string $table_name;

    public function __construct()
    {
        $dotenv = Dotenv::createUnsafeImmutable(Application::$ROOT_PARH)->load();
        $this->server = getenv('DB_SERVER');
        $this->username = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
        $this->dbname = getenv('DB_NAME');
        $this->connection();
    }
    
    private function connection()
    {
        try {
            $dns = "mysql:host=$this->server;dbname=$this->dbname";
            $this->conn = new PDO($dns, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function table(string $table_name){
        $this->table_name=' '.$table_name;
        return $this;
    }
    public function select()
    {
        $stmt=$this->conn->prepare($this->querySelectAll().$this->table_name);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    }
}
