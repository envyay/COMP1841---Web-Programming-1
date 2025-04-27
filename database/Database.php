<?php


namespace database;
use PDO;
use PDOException;

class Database
{
    function connect(): ?PDO
    {
        $host = "localhost";
        $dbname = "student_so";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);


            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            echo "connect failed: " . $e->getMessage();
        }
        return null;
    }
}