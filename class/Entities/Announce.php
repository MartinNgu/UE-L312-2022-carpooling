<?php

namespace App\Entities;

use DateTime;

class Announce
{
    private $id;
    private $nameannounce;
    private $car;
    private $dateannounce;
    private $citystart;
    private $cityend;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getNameAnnounce(): string
    {
        return $this->nameannounce;
    }

    public function setNameAnnounce(string $nameannounce): void
    {
        $this->nameannounce = $nameannounce;
    }

    public function getCar(): string
    {
        return $this->car;
    }

    public function setCar(string $car): void
    {
        $this->car = $car;
    }

    public function getDateAnnounce(): DateTime
    {
        return $this->dateannounce;
    }

    public function setDateAnnounce(DateTime $dateannounce): void
    {
        $this->dateannounce = $dateannounce;
    }

    
    public function getCityStart(): string
    {
        return $this->citystart;
    }

    public function setCityStart(string $citystart): void
    {
        $this->citystart = $citystart;
    }

    
    public function getCityEnd(): string
    {
        return $this->cityend;
    }

    public function setCityEnd(string $cityend): void
    {
        $this->cityend = $cityend;
    }
}
