<?php

namespace App\Controllers;

use App\Services\ReservationsService;

class ReservationsController
{
    /**
     * Return the html for the create action.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['author']) &&
            isset($_POST['client']) &&
            isset($_POST['rescitystart']) &&
            isset($_POST['rescityend']) &&
            isset($_POST['dateres'])) {
            // Create the reservation :
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservation(
                null,
                $_POST['author'],
                $_POST['client'],
                $_POST['rescitystart'],
                $_POST['rescityend'],
                $_POST['dateres']
            );
            if ($isOk) {
                $html = 'Réservation créée avec succès.';
            } else {
                $html = 'Erreur lors de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getReservations(): string
    {
        $html = '';

        // Get all reservations :
        $reservationsService = new ReservationsService();
        $reservations = $reservationsService->getReservations();

        // Get html :
        foreach ($reservations as $reservation) {
            $html .=
                '#' . $reservation->getId() . ' ' .
                $reservation->getAuthor() . ' ' .
                $reservation->getClient() . ' ' .
                $reservation->getRescitystart() . ' ' .
                $reservation->getRescityend() . ' ' .
                $reservation->getDateres()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    /**
     * Update the reservation.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['author']) &&
            isset($_POST['client']) &&
            isset($_POST['rescitystart']) &&
            isset($_POST['rescityend']) &&
            isset($_POST['dateres'])) {
            // Update the reservation :
            $usersService = new ReservationsService();
            $isOk = $reservationsService->setReservation(
                $_POST['id'],
                $_POST['author'],
                $_POST['client'],
                $_POST['rescitystart'],
                $_POST['rescityend'],
                $_POST['dateres']
            );
            if ($isOk) {
                $html = 'Réservation mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the reservation :
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }
}
