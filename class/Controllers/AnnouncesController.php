<?php

namespace App\Controllers;

use App\Services\announcesService;

class announcesController
{
    /**
     * Return the html for the create action.
     */
    public function createannounce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['dateannounce']) &&
            isset($_POST['citystart']) &&
            isset($_POST['cityend'])) {
            // Create the announce :
            $announcesService = new announcesService();
            $announceId = $announcesService->setannounce(
                null,
                $_POST['dateannounce'],
                $_POST['citystart'],
                $_POST['cityend']
            );

            // Create the announce user relations :
            $isOk = true;
            if (!empty($_POST['users'])) {
                foreach ($_POST['users'] as $userId) {
                    $isOk = $announcesService->setAnnounceUser($announceId, $userId);
                }
            }
            // Create the announce cars relations :
            $isOk = true;
            if (!empty($_POST['cars'])) {
                foreach ($_POST['cars'] as $carId) {
                    $isOk = $announcesService->setAnnounceCar($announceId, $carId);
                }
            }
            if ($announceId && $isOk) {
                $html = 'Annonce créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getannounces(): string
    {
        $html = '';

        // Get all announces :
        $announcesService = new AnnouncesService();
        $announces = $announcesService->getannounces();

        // Get html :
        foreach ($announces as $announce) {
            $usersHtml = '';
            if (!empty($announce->getUsers())) {
                foreach ($announce->getUsers() as $user) {
                    $usersHtml .= $user->getLastname() . ' ';
                }
            }
            $carsHtml = '';
            if (!empty($announce->getCars())) {
                foreach ($announce->getCars() as $car) {
                    $carsHtml .= $car->getBrand() . ' ' . $car->getModel() . ' ' . $car->getColor() . ' ';
                }
            }
            $html .=
                '#' . $announce->getId() . ' ' .
                $usersHtml . ' '.
                $carsHtml . ' '.
                $announce->getDateannounce()->format('d-M-Y') . ' ' .
                $announce->getCitystart() . ' ' .
                $announce->getCityend() . '<br />';
        }

        return $html;
    }

    /**
     * Update the announce.
     */
    public function updateannounce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['dateannounce']) &&
            isset($_POST['citystart']) &&
            isset($_POST['cityend'])) {
            // Update the announce :
            $announcesService = new announcesService();
            $isOk = $announcesService->setannounce(
                $_POST['id'],
                $_POST['dateannounce'],
                $_POST['citystart'],
                $_POST['cityend']
            );
            if ($isOk) {
                $html = 'Annonce mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an announce.
     */
    public function deleteannounce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the announce :
            $announcesService = new announcesService();
            $isOk = $announcesService->deleteannounce($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
