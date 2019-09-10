<?php


namespace App\Infrastructure;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\HttpClient;

class HttpExecCommand
{
    private $logger;

    /**
     * HttpExecCommand constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function callUrl($urlToCall) {
        $this->logger->debug("UrlToCall : ".$urlToCall);
        $client = HttpClient::create();
        $client->request('GET', $urlToCall);
    }


}