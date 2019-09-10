<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HealthController extends AbstractController
{
    /**
     * HealthController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @Route("/health/", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getHealthCheck() {
        return $this->json(['status' => 'UP']);
    }
}