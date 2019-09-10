<?php


namespace App\Controller\Command;


use App\Domain\Model\Climatiseur;
use App\Domain\Model\Temperature;

class ChangeTemperatureCommand
{
    protected $climatiseur;

    /**
     * ChangeTemperatureCommand constructor.
     * @param $climatiseur
     */
    public function __construct(Climatiseur $climatiseur, Temperature $temperature)
    {
        $this->climatiseur = $climatiseur;
        $this->climatiseur->definirLaTemperature($temperature);
    }

    /**
     * @return Climatiseur
     */
    public function getClimatiseur(): Climatiseur
    {
        return $this->climatiseur;
    }
}