<?php

namespace model;

class Login
{
    public string $id;
    public string $email;
    public string $password;

    public function __construct()
    {
    }

    public function init(string $email, string $password): Login
    {
        $this->email = $email;
        $this->password = $password;
        return $this;
    }
}