<?php

namespace App\Entities;

use DateTime;

class Car
{
    private $id;
    private $brand;
    private $model;
    private $powercar;
    private $birth;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getPowercar(): int
    {
        return $this->powercar;
    }

    public function setPowercar($powercar): void
    {
        $this->powercar = $powercar;
    }

    public function getBirth(): DateTime
    {
        return $this->birth;
    }

    public function setBirth(DateTime $birth): void
    {
        $this->birth = $birth;
    }
}
