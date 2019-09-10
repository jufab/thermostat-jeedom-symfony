<?php
namespace App\Domain\Model;

class Temperature
{
    var $valeur;

    /**
     * Temperature constructor.
     * @param int $valeur
     */
    public function __construct(int $valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * @return mixed
     */
    public function getValeur(): int
    {
        return $this->valeur;
    }
}