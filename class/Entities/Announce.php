<?php

namespace App\Entities;

use DateTime;

class announce
{
    private $id;
    private $cars;
    private $dateannounce;
    private $citystart;
    private $cityend;
    private $users;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getDateannounce(): DateTime
    {
        return $this->dateannounce;
    }

    public function setDateannounce(DateTime $dateannounce): void
    {
        $this->dateannounce = $dateannounce;
    }

    public function getCitystart(): string
    {
        return $this->citystart;
    }

    public function setCitystart($citystart): void
    {
        $this->citystart = $citystart;
    }

    public function getCityend(): string
    {
        return $this->cityend;
    }

    public function setCityend($cityend): void
    {
        $this->cityend = $cityend;
    }

    public function getUsers(): ?array
    {
        return $this->users;
    }

    public function setUsers(array $users)
    {
        $this->users = $users;

        return $this;
    }

    public function getCars(): ?array
    {
        return $this->cars;
    }

    public function setCars(array $cars)
    {
        $this->cars = $cars;

        return $this;
    }
}
