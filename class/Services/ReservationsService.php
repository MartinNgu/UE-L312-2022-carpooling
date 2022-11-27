<?php

namespace App\Services;

use App\Entities\Reservation;
use App\Entities\Car;
use App\Entities\User;
use App\Entities\announce;
use DateTime;

class ReservationsService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $author, string $client, string $rescitystart, string $rescityend, string $dateres): string
    {
        $reservationId = '';

        $dataBaseService = new DataBaseService();
        $dateresDateTime = new DateTime($dateres);
        if (empty($id)) {
            $reservationId = $dataBaseService->createReservation($author, $client, $rescitystart, $rescityend, $dateresDateTime);
        } else {
            $dataBaseService->updateReservation($id, $author, $client, $rescitystart, $rescityend, $dateresDateTime);
            $reservationId = $id;
        }

        return $reservationId;
    }

    /**
     * Return all reservations.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $dataBaseService = new DataBaseService();
        $reservationsDTO = $dataBaseService->getReservations();
        if (!empty($reservationsDTO)) {
            foreach ($reservationsDTO as $reservationsDTO) {
                // Get reservation :
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

    // /**
    //  * Create relation bewteen an user and a reservation.
    //  */
    // public function setUserReservation(string $userId, string $reservationId): bool
    // {
    //     $isOk = false;
    //
    //     $dataBaseService = new DataBaseService();
    //     $isOk = $dataBaseService->setUserReservation($userId, $reservationId);
    //
    //     return $isOk;
    // }

    /**
     * Create relation bewteen an announce and his reservationr.
     */
    public function setAnnounceReservation(string $announceId, string $reservationId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnounceReservation($announceId, $reservationId);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getAnnounceReservations(string $announceId): array
    {
        $announceReservations = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $announcesreservationsDTO = $dataBaseService->getAnnounceReservation($announceId);
        if (!empty($announcesreservationsDTO)) {
            foreach ($announcesreservationsDTO as $annoucereservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($annoucereservationDTO['id']);
                $reservation->setRescitystart($annoucereservationDTO['rescitystart']);
                $reservation->setRescityend($annoucereservationDTO['rescityend']);
                $reservation->setDateres($annoucereservationDTO['dateres']);
                $announcereservations[] = $reservation;
            }
        }

        return $announceReservations;
    }
}
