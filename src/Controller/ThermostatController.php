<?php

namespace App\Controller;


use App\Controller\Command\ChangeTemperatureCommand;
use App\Domain\Model\ListeDeClimatiseur;
use App\Domain\Model\Temperature;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThermostatController extends AbstractController
{

    private $logger;

    /**
     * ThermostatController constructor.
     * @param $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @Route("/thermostat/{valeur}", methods={"PUT"})
     */
    public function setTemperature(int $valeur) {
        $temperature = new Temperature($valeur);
        $listeDesClims = new ListeDeClimatiseur();
        foreach ($listeDesClims->getListeDeClimatiseur() as $climatiseur) {
            $changeTemperatureCommand = new ChangeTemperatureCommand($climatiseur,$temperature);
            try {
                $this->dispatchMessage($changeTemperatureCommand);
            } catch (\Throwable $error) {
                $this->logger->error($error);
                return JsonResponse::create(['message' => $error->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
        return new Response();
    }

    /**
     * @Route("/thermostat/", methods={"GET"})
     */
    public function getHello() {
        return new Response(
            '<html><body>hello Toi</body></html>'
        );
    }
}