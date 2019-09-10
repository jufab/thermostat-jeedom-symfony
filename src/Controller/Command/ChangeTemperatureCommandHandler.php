<?php


namespace App\Controller\Command;

use App\Domain\Repository\ClimatiseurRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class ChangeTemperatureCommandHandler implements MessageHandlerInterface
{
    private $climatiseurRepositroy;

    /**
     * ChangeTemperatureCommandHandler constructor.
     * @param $climatiseurRepositroy
     */
    public function __construct(ClimatiseurRepository $climatiseurRepositroy)
    {
        $this->climatiseurRepositroy = $climatiseurRepositroy;
    }


    public function __invoke(ChangeTemperatureCommand $changeTemperatureCommand) {
        $this->climatiseurRepositroy->executeCommandeTemperature($changeTemperatureCommand->getClimatiseur());
    }
}