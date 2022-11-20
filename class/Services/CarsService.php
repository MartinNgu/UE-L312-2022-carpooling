<?php

namespace App\Services;

use App\Entities\Car;
use DateTime;

class CarsService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $id, string $brand, string $model, int $powercar, string $birth): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $birthDateTime = new DateTime($birth);
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($brand, $model, $powercar, $birthDateTime);
        } else {
            $isOk = $dataBaseService->updateCar($id, $brand, $model, $powercar, $birthDateTime);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setBrand($carDTO['brand']);
                $car->setModel($carDTO['model']);
                $car->setPowercar($carDTO['powercar']);
                $date = new DateTime($carDTO['birth']);
                if ($date !== false) {
                    $car->setbirth($date);
                }
                $cars[] = $car;
            }
        }

        return $cars;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCar($id);

        return $isOk;
    }
}
