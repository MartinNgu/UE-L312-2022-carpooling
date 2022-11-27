<?php

namespace App\Services;

use App\Entities\Announce;
use App\Entities\User;
use App\Entities\Car;
use DateTime;

class AnnouncesService
{
    /**
     * Create or update an announce.
     */
    public function setannounce(?string $id, string $dateannounce, string $citystart, string $cityend): bool
    {
        $announceId = '';

        $dataBaseService = new DataBaseService();
        $dateannounceDateTime = new DateTime($dateannounce);
        if (empty($id)) {
            $announceId = $dataBaseService->createannounce($dateannounceDateTime, $citystart, $cityend);
        } else {
            $dataBaseService->updateannounce($id, $dateannounceDateTime, $citystart, $cityend);
            $announceId = $id;
        }

        return $announceId;
    }

    /**
     * Return all announces.
     */
    public function getannounces(): array
    {
        $announces = [];

        $dataBaseService = new DataBaseService();
        $announcesDTO = $dataBaseService->getannounces();
        if (!empty($announcesDTO)) {
            foreach ($announcesDTO as $announceDTO) {
                $announce = new announce();
                $announce->setId($announceDTO['id']);
                $date = new DateTime($announceDTO['dateannounce']);
                if ($date !== false) {
                    $announce->setdateannounce($date);
                }
                $announce->setCitystart($announceDTO['citystart']);
                $announce->setCityend($announceDTO['cityend']);

                // Get users of this announce :
                $users = $this->getAnnounceUsers($announceDTO['id']);
                $announce->setUsers($users);

                $announces[] = $announce;

                // Get cars of this announce :
                $cars = $this->getAnnounceCars($announceDTO['id']);
                $announce->setCars($cars);

                $announces[] = $announce;
            }
        }

        return $announces;
    }

    /**
     * Delete an announce.
     */
    public function deleteannounce(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteannounce($id);

        return $isOk;
    }

        /**
     * Create relation between an announce and his user.
     */
    public function setAnnounceUser(string $announceId, string $userId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnounceUser($announceId, $userId);

        return $isOk;
    }

    /**
     * Get user of given announce id.
     */
    public function getAnnounceUsers(string $announceId): array
    {
        $announceUsers = [];

        $dataBaseService = new DataBaseService();

        // Get relation announces and users :
        $announcesUsersDTO = $dataBaseService->getAnnounceUsers($announceId);
        if (!empty($announcesUsersDTO)) {
            foreach ($announcesUsersDTO as $announceUserDTO) {
                $user = new User();
                $user->setId($announceUserDTO['id']);
                $user->setFirstname($announceUserDTO['firstname']);
                $user->setLastname($announceUserDTO['lastname']);
                $user->setemail($announceUserDTO['email']);
                $announceUsers[] = $user;
            }
        }

        return $announceUsers;
    }

      /**
     * Create relation bewteen an announce and his car.
     */
    public function setAnnounceCar(string $announceId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnounceCar($announceId, $carId);

        return $isOk;
    }

    /**
     * Get cars of given announce id.
     */
    public function getAnnounceCars(string $announceId): array
    {
        $announceCars = [];

        $dataBaseService = new DataBaseService();

        // Get relation announces and cars :
        $announcesCarsDTO = $dataBaseService->getAnnounceCars($announceId);
        if (!empty($announcesCarsDTO)) {
            foreach ($announcesCarsDTO as $announceCarDTO) {
                $car = new Car();
                $car->setId($announceCarDTO['id']);
                $car->setBrand($announceCarDTO['brand']);
                $car->setModel($announceCarDTO['model']);
                $car->setColor($announceCarDTO['color']);
                $car->setNbrSlots($announceCarDTO['nbrSlots']);
                $announceCars[] = $car;
            }
        }

        return $announceCars;
    }
}
