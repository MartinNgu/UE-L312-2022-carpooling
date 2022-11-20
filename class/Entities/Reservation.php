<?php

namespace App\Entities;

use DateTime;

class Reservation
{
    private $id;
    private $author;
    private $client;
    private $rescitystart;
    private $rescityend;
    private $dateres;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getClient(): string
    {
        return $this->client;
    }

    public function setClient(string $client): void
    {
        $this->client = $client;
    }

    public function getRescitystart(): string
    {
        return $this->rescitystart;
    }

    public function setRescitystart($rescitystart): void
    {
        $this->rescitystart = $rescitystart;
    }

    public function getDateres(): DateTime
    {
        return $this->dateres;
    }

    public function setDateres(DateTime $dateres): void
    {
        $this->dateres = $dateres;
    }
}
