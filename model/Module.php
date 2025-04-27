<?php

namespace model;

class Module
{
    public int $id;
    public string $name;

    public function __construct() {}

    public function init(int $id, string $name) : Module {
        $this->id = $id;
        $this->name = $name;
        return $this;
    }

    public function mapFromRow(mixed $row): Module {
        $this->id = $row["id"];
        $this->name = $row["name"];
        return $this;
    }
}