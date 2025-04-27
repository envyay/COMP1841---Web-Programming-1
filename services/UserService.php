<?php

namespace services;

use database\Database;
use PDO;
use model\User;

class UserService
{
    private PDO $pdo;
    private string $tableName = "User";

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    public function getAllUser(): array
    {
        $sql = "SELECT * FROM {$this->tableName}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $users = array_map(function ($row) {
            $user = new User();
            return $user->mapFromRow($row);
        }, $rows);
        return $users;
    }


    public function getUserById(int $id): User
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $row = $stmt->fetch();
        $user = new User();
        return $user->mapFromRow($row);
    }

    public function updateUser(User $user): bool
    {
        $sql = "UPDATE {$this->tableName} SET full_name = :fullName, email = :email, password = :password, avatar = :avatar, class = :class, role = :role WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $hashed_password = password_hash($user->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':fullName', $user->fullName);
        $stmt->bindParam(':id', $user->id);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(':avatar', $user->avatar);
        $stmt->bindParam(':class', $user->class);
        $stmt->bindParam(':role', $user->role);

        return $stmt->execute();
    }

    public function deleteUser(int $id): bool
    {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function insertUser(User $user): bool
    {
        $sql = "INSERT INTO {$this->tableName} (full_name, email, password, avatar, class, role) VALUES (:fullName, :email, :password, :avatar, :class, :role)";
        $stmt = $this->pdo->prepare($sql);
        $hashed_password = password_hash($user->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':fullName', $user->fullName);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(':avatar', $user->avatar);
        $stmt->bindParam(':class', $user->class);
        $stmt->bindParam(':role', $user->role);

        return $stmt->execute();
    }

    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();
        $user = new User();
        return $user->mapFromRow($row);
    }

    public function login(string $email, string $password): ?User
    {
        $user = $this->getUserByEmail($email);
        if (!$user) {
            return null;
        }

        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }

    public function getAllAdmins(): array {
        $sql = "SELECT * FROM {$this->tableName} WHERE role = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $admins = array_map(function ($row) {
            $admin = new User();
            return $admin->mapFromRow($row);
        }, $rows);
        return $admins;
    }
}