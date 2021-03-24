<?php
namespace App\Services;

use Symfony\Component\Validator\Constraints\Json;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ServiceDraws 
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchLoteryResult(): array
    {
        $response = $this->client->request(
            'GET',
            'https://www.fdj.fr/api/service-draws/v1/games/euromillions/draws?include=results,addons&range=0-0'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        // $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}