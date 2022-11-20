<?php

namespace App\Services;

use App\Entities\Reservation;
use DateTime;

class ReservationsService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $author, string $client, string $rescitystart, string $rescityend, string $dateres): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $dateresDateTime = new DateTime($dateres);
        if (empty($id)) {
            $isOk = $dataBaseService->createReservation($author, $client, $rescitystart, $rescityend, $dateres);
        } else {
            $isOk = $dataBaseService->updateReservation($id, $author, $client, $rescitystart, $rescityend, $dateres);
        }

        return $isOk;
    }

    /**
     * Return all reservation.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $dataBaseService = new DataBaseService();
        $reservationsDTO = $dataBaseService->getReservations();
        if (!empty($reservationsDTO)) {
            foreach ($reservationsDTO as $reservationsDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationsDTO['id']);
                $reservation->setAuthor($reservationsDTO['author']);
                $reservation->setClient($reservationsDTO['client']);
                $reservation->setRescitystart($reservationsDTO['rescitystart']);
                $reservation->setRescityend($reservationsDTO['rescityend']);
                $dateres = new DateTime($reservationsDTO['dateres']);
                if ($dateres !== false) {
                    $reservation->setDateres($dateres);
                }
                $reservations[] = $reservation;
            }
        }

        return $reservations;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteReservation($id);

        return $isOk;
    }
}
