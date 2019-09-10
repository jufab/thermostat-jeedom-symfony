<?php


namespace App\Infrastructure;

use App\Domain\Model\Climatiseur as ClimatiseurDomain;
use App\Domain\Repository\ClimatiseurRepository;
use Psr\Log\LoggerInterface;

class ClimatiseurRepositoryImpl implements ClimatiseurRepository
{
    protected $executeHTTP;
    private $logger;

    /**
     * ClimatiseurRepositoryImpl constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->executeHTTP = new HttpExecCommand($this->logger);
    }

    public function executeCommandeTemperature(ClimatiseurDomain $climatiseur)
    {
        $this->executeHTTP->callUrl($climatiseur->genereLUrlJeedom());
    }
}