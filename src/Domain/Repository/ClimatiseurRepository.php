<?php


namespace App\Domain\Repository;

use App\Domain\Model\Climatiseur as ClimatiseurDomain;

interface ClimatiseurRepository
{
    public function executeCommandeTemperature(ClimatiseurDomain $climatiseur);

}