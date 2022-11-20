<?php

namespace App\Controllers;

use App\Services\AnnouncesService;

class AnnouncesController
{
    /**
     * Return the html for the create action.
     */
    public function createAnnounce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['nameannouce']) &&
            isset($_POST['car']) &&
            isset($_POST['dateannounce']) &&
            isset($_POST['citystart']) &&
            isset($_POST['cityend'])) {
            // Create the announce :
            $AnnounceService = new AnnouncesService();
            $isOk = $AnnounceService->setAnnounce(
                null,
                $_POST['nameannounce'],
                $_POST['car'],
                $_POST['dateannounce'],
                $_POST['citystart'],
                $_POST['cityend']
            );
            if ($isOk) {
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
    public function getAnnounce(): string
    {
        $html = '';

        // Get all announce :
        $AnnounceService = new AnnouncesService();
        $Announce = $AnnounceService->getAnnounce();

        // Get html :
        foreach ($Announce as $Announce) {
            $html .=
                '#' . $Announce->getId() . ' ' .
                $Announce->getNameAnnounce() . ' ' .
                $Announce->getCar() . ' ' .
                $Announce->getDateAnnounce()->format('d-m-Y') . '<br />'.
                $Announce->getCityStart() . ' ' .
                $Announce->getCityEnd() . ' ' ;
                
        }

        return $html;
    }

    /**
     * Update the announce.
     */
    public function updateAnnounce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['nameannounce']) &&
            isset($_POST['car']) &&
            isset($_POST['dateannounce']) &&
            isset($_POST['citystart']) &&
            isset($_POST['cityend'])) {
            // Update the announce :
            $AnnounceService = new AnnouncesService();
            $isOk = $AnnounceService->setAnnounce(
                $_POST['id'],
                $_POST['nameannounce'],
                $_POST['car'],
                $_POST['dateannounce'],
                $_POST['citystart'],
                $_POST['cityend']
            );
            if ($isOk) {
                $html = 'Annonce mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annoncer.';
            }
        }

        return $html;
    }

    /**
     * Delete an announce.
     */
    public function deleteAnnounce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $AnnounceService = new AnnouncesService();
            $isOk = $AnnounceService->deleteAnnounce($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
