<?php

namespace GrooveHQ;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Command\Guzzle\Description as GuzzleHttpDescription;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

class Client
{
    /**
     * @var string
     */
    protected $apiToken;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzleHttpClient;

    /**
     * @var array
     */
    protected $services = [];

    /**
     * Constructor
     *
     * @param string $apiToken
     * @param string $apiUri
     * @param string $apiVersion
     * @param \GuzzleHttp\Client $guzzleHttpClient
     * @return void
     */
    public function __construct($apiToken, GuzzleHttpClient $guzzleHttpClient = null)
    {
        $this->apiToken = $apiToken;
        $this->guzzleHttpClient = $guzzleHttpClient ?: new GuzzleHttpClient();
    }

    public function __call($name, $args)
    {
        $classname = '\GrooveHQ\Service\\' . ucfirst($name) . 'Description';

        if (empty($this->services[$name])) {
            $this->services[$name] = new $classname([]);
        }

        return $this->init(
            $this->guzzleHttpClient,
            $this->services[$name],
            ['defaults' => ['access_token' => $this->apiToken]]
        );
    }

    /* For testing purposes */
    protected function init(
        GuzzleHttpClient $httpClient,
        GuzzleHttpDescription $httpDescription,
        array $options = []
    ) {
        return new GuzzleClient($httpClient, $httpDescription, $options);
    }

}
