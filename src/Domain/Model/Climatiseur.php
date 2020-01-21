<?php

namespace App\Domain\Model;

use App\Domain\Event\TemperatureChangedEvent;

class Climatiseur
{
    private $idJeedom;
    private $slider;

    /**
     * Climatiseur constructor.
     * @param $idJeedom
     * @param Temperature $slider
     */
    public function __construct(string $idJeedom, Temperature $slider)
    {
        $this->idJeedom = $idJeedom;
        $this->slider = $slider;
    }

    /**
     * @return int
     */
    public function getIdJeedom(): int
    {
        return $this->idJeedom;
    }

    /**
     * @param int $idJeedom
     */
    public function setIdJeedom(int $idJeedom): void
    {
        $this->idJeedom = $idJeedom;
    }

    /**
     * @return Temperature
     */
    public function getSlider(): Temperature
    {
        return $this->slider;
    }

    /**
     * @param Temperature $slider
     */
    public function definirLaTemperature(Temperature $slider): void
    {
        $this->slider = $slider;
    }

    public function genereLUrlJeedom(): string
    {
        return Jeedom::GetURL() . "?apikey=" . Jeedom::GetAPIKEY() ."&type=cmd&id=".$this->idJeedom."&slider=".$this->slider->getValeur();
    }

    public function __toString() : string
    {
        return var_export($this,true);
    }



}