<?php

namespace model;

class User
{
    public ?int $id;
    public string $fullName;
    public string $email;
    public string $password;
    public string $avatar;
    public string $class;
    public int $role;

    public function __construct() {}

    public function init(?int $id, string $fullName, string $email, string $password, string $avatar, string $class, int $role) : User {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->avatar = $avatar;
        $this->class = $class;
        $this->role = $role;
        return $this;
    }

    public function mapFromRow(mixed $row): User {
        $this->id = $row["id"];
        $this->fullName = $row["full_name"];
        $this->email = $row["email"];
        $this->password = $row["password"];
        $this->avatar = $row["avatar"];
        $this->class = $row["class"];
        $this->role = $row["role"];
        return $this;
    }
}