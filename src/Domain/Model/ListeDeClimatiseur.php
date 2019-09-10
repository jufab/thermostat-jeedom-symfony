<?php

namespace App\Domain\Model;

class ListeDeClimatiseur
{
    private $listeClimatiseur;

    /**
     * ListeDeClimatiseur constructor.
     */
    public function __construct()
    {
        $temperature = new Temperature(0);
        $this->listeClimatiseur = Array();
        $this->listeClimatiseur[0] = new Climatiseur(535,$temperature);
        $this->listeClimatiseur[1] = new Climatiseur(1861,$temperature);
        $this->listeClimatiseur[2] = new Climatiseur(1850,$temperature);
        $this->listeClimatiseur[3] = new Climatiseur(1849,$temperature);
    }

    public function getListeDeClimatiseur() : array
    {
        return $this->listeClimatiseur;
    }
}