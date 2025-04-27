<?php

namespace services;
//include '../database/Database.php';
//include '../model/Module.php';

use database\Database;
use model\Module;
use PDO;

class ModuleService
{
    private PDO $pdo;
    private string $tableName = "Module";
    public function __construct() {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    public function getAllModules(): array
    {
        $sql = "SELECT * FROM {$this->tableName}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $modules =  array_map(function ($row) {
            $module = new Module();
            return $module->mapFromRow($row);
        },  $rows);
        return $modules;
    }

    public function getModuleById(int $id): Module  {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $row = $stmt->fetch();
        $module = new Module();
        return $module->mapFromRow($row);
    }

    public function updateModule(Module $module): bool {
        $sql = "UPDATE {$this->tableName} SET name = :name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':name', $module->name);
        $stmt->bindParam(':id', $module->id);

        return $stmt->execute();
    }

    public function deleteModule(int $id): bool {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function insertModule(string $name): bool {
        $sql = "INSERT INTO {$this->tableName} (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }
}