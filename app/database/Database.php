<?php
namespace app\database;
use PDO;
use PDOException;
class Database
{
    private $connect;
    public function __construct()
    {
        try {
            $host = 'localhost';
            $dbname = 'Xameleyon';
            $username = 'root';
            $password = '';
            $dsn = "mysql:host=$host;dbname=$dbname";

            $this->connect = new PDO($dsn, $username, $password);

        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function getAll($sql, $params = [])
    {
        $statement = $this->connect->prepare($sql);
        $statement->execute($params);
        $objects = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $objects;
    }

    public function getOne($sql, $params = [])
    {
        $statement = $this->connect->prepare($sql);
        $statement->execute($params);
        $object = $statement->fetch(PDO::FETCH_ASSOC);
        return $object; 
    }

    public function send($sql, $values)
    {
        $statement = $this->connect->prepare($sql);
        $statement->execute($values);
        return true;
    }
}
?>