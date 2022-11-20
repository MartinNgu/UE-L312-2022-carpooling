<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = '';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create an announce.
     */
    public function createAnnounce(string $nameannounce, string $car, DateTime $dateannounce, string $citystart, string $cityend): bool
    {
        $isOk = false;

        $data = [
            'nameannounce' => $nameannounce,
            'car' => $car,
            'dateannounce' => $dateannounce->format(DateTime::RFC3339),
            'citystart' => $citystart,
            'cityend' => $cityend,
        ];
        $sql = 'INSERT INTO announces (nameannounce, car, dateannounce, citystart, cityend) VALUES (:nameannounce, :car, :dateannounce, :citystart, :cityend)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all announce.
     */
    public function getAnnounce(): array
    {
        $announces = [];

        $sql = 'SELECT * FROM announces';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $announces = $results;
        }

        return $announces;
    }

    /**
     * Update an announce.
     */
    public function updateAnnounce(string $id, string $nameannounce, string $car, DateTime $dateannounce, string $citystart, string $cityend): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'nameannounce' => $nameannounce,
            'car' => $car,
            'dateannounce' => $dateannounce->format(DateTime::RFC3339),
            'citystart' => $citystart,
            'cityend' => $cityend,
        ];
        $sql = 'UPDATE announces SET nameannounce = :nameannounce, car = :car, dateannounce = :dateannounce, citystart = :citystart, cityend = :cityend WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteAnnounce(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM announces WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}

    /**
     * Create a car.
     */
    public function createCar(string $brand, string $model, int $powercar, int $birth): bool
    {
        $isOk = false;

        $data = [
            'brand' => $brand,
            'model' => $model,
            'powercar' => $powercar,
            'birth' => $birth,
        ];
        $sql = 'INSERT INTO cars (brand, model, powercar, birth) VALUES (:brand, :model, :powercar, :birth)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Update a car.
     */
    public function updateCar(string $id, string $brand, string $model, int $powercar, int $birth): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'brand' => $brand,
            'model' => $model,
            'powercar' => $powercar,
            'birth' => $birth,
        ];
        $sql = 'UPDATE cars SET brand = :brand, model = :model, powercar = :powercar, birth = :birth WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}
