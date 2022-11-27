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
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): string
    {
        $userId = '';

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if ($isOk) {
            $userId = $this->connection->lastInsertId();
        }

        return $userId;
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
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'carId' => $carId,
        ];
        $sql = 'INSERT INTO users_cars (user_id, car_id) VALUES (:userId, :carId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN users_cars as uc ON uc.car_id = c.id
            WHERE uc.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userCars = $results;
        }

        return $userCars;
    }

    
    /**
     * Create an announce.
     */
    public function createannounce(DateTime $dateannounce, string $citystart, string $cityend): string
    {
        $announceId = '';

        $data = [
            'dateannounce' => $dateannounce->format(DateTime::RFC3339),
            'citystart' => $citystart,
            'cityend' => $cityend,
        ];
        $sql = 'INSERT INTO announces (dateannounce, citystart, cityend) VALUES (:dateannounce, :citystart, :cityend)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if ($isOk) {
            $announceId = $this->connection->lastInsertId();
        }

        return $announceId;
    }

    /**
     * Return all announces.
     */
    public function getannounces(): array
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
    public function updateannounce(string $id, DateTime $dateannounce, string $citystart, string $cityend): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'dateannounce' => $dateannounce->format(DateTime::RFC3339),
            'citystart' => $citystart,
            'cityend' => $cityend,
            
        ];
        $sql = 'UPDATE announces SET dateannounce = :dateannounce, citystart = :citystart, cityend = :cityend WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an announce.
     */
    public function deleteannounce(string $id): bool
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

    /**
     * Create relation bewteen an announce and his user.
     */
    public function setAnnounceUser(string $announceId, string $userId): bool
    {
        $isOk = false;

        $data = [
            'announceId' => $announceId,
            'userId' => $userId,
        ];
        $sql = 'INSERT INTO announces_users (announce_id, user_id) VALUES (:announceId, :userId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get user of given announce id.
     */
    public function getAnnounceUsers(string $announceId): array
    {
        $announceUsers = [];

        $data = [
            'announceId' => $announceId,
        ];
        $sql = '
            SELECT c.*
            FROM users as c
            LEFT JOIN announces_users as uc ON uc.user_id = c.id
            WHERE uc.announce_id = :announceId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $announceUsers = $results;
        }

        return $announceUsers;
    }

        /**
     * Create relation bewteen an announce and his car.
     */
    public function setAnnounceCar(string $announceId, string $carId): bool
    {
        $isOk = false;

        $data = [
            'announceId' => $announceId,
            'carId' => $carId,
        ];
        $sql = 'INSERT INTO announces_cars (announce_id, car_id) VALUES (:announceId, :carId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getAnnounceCars(string $announceId): array
    {
        $announceCars = [];

        $data = [
            'announceId' => $announceId,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN announces_cars as uc ON uc.car_id = c.id
            WHERE uc.announce_id = :announceId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $announceCars = $results;
        }

        return $announceCars;
    }

}
