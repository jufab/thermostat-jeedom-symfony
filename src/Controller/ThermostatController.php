<?php

namespace App\Controller;


use App\Controller\Command\ChangeTemperatureCommand;
use App\Domain\Model\Jeedom;
use App\Domain\Model\ListeDeClimatiseur;
use App\Domain\Model\Temperature;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @param int $valeur
     * @return JsonResponse|Response
     */
    public function setTemperature(Request $request, int $valeur) {
        if($request->query->get('apikey') != Jeedom::GetAPIKEY()) {
            return JsonResponse::create(['message' => 'error API'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
}