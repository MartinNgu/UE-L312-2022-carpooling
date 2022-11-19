<?php

namespace App\Services;

use App\Entities\Announce;
use DateTime;

class AnnouncesService
{
    /**
     * Create or update an announce.
     */
    public function setAnnounce(?string $id, string $nameannounce, string $car, string $dateannounce, string $citystart, string $cityend): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $dateannounceDateTime = new DateTime($dateannounce);
        if (empty($id)) {
            $isOk = $dataBaseService->createAnnounce($nameannounce, $car, $dateannounceDateTime, $citystart, $cityend);
        } else {
            $isOk = $dataBaseService->updateAnnounce($id, $nameannounce, $car, $dateannounceDateTime, $citystart, $cityend);
        }

        return $isOk;
    }

    /**
     * Return all announce.
     */
    public function getAnnounce(): array
    {
        $Announces = [];

        $dataBaseService = new DataBaseService();
        $AnnouncesDTO = $dataBaseService->getAnnounce();
        if (!empty($AnnouncesDTO)) {
            foreach ($AnnouncesDTO as $AnnounceDTO) {
                $Announce = new Announce();
                $Announce->setId($AnnounceDTO['id']);
                $Announce->setNameAnnounce($AnnounceDTO['nameannounce']);
                $Announce->setCar($AnnounceDTO['car']);
                $dateannounce = new DateTime($AnnounceDTO['dateannounce']);
                if ($dateannounce !== false) {
                    $Announce->setdateannounce($dateannounce);
                }
                $Announce->setCityStart($AnnounceDTO['citystart']);
                $Announce->setCityEnd($AnnounceDTO['cityend']);
                
                $Announces[] = $Announce;
            }
        }

        return $Announces;
    }

    /**
     * Delete an Announce.
     */
    public function deleteAnnounce(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAnnounce($id);

        return $isOk;
    }
}
