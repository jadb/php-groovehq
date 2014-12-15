<?php

namespace GrooveHQ\Service;

use Cake\Utility\Inflector;
use GuzzleHttp\Command\Guzzle\Description;

abstract class BasicServiceDescription extends Description
{
    const BASE_URL = 'https://api.groovehq.com';
    const DOCUMENTATION_URL = 'https://www.groovehq.com/docs/';
    const NAME = 'GrooveHQ API';
    const DESCRIPTION = '';
    const API_VERSION = '1';

    public function __construct(array $config, array $options = [])
    {
        $config = $this->normalizeConfig($config);
        parent::__construct($config, $options);
    }

    public function getServiceName()
    {
        $name = explode('\\', get_class($this));
        return strtolower(str_replace('Description', '', array_pop($name)));
    }

    protected function normalizeConfig($config)
    {
        $serviceDescription = $this->getServiceDescription() + ['operations' => [], 'models' => []];

        $additionalParameters = $config;
        $baseUrl = self::BASE_URL;
        $operations = $this->normalizeOperations($serviceDescription['operations'], $config);
        $models = $this->normalizeModels($serviceDescription['models']);
        $name = self::NAME;
        $description = self::DESCRIPTION;
        $apiVersion = self::API_VERSION;

        return compact('baseUrl', 'operations', 'models', 'apiVersion')
            + $serviceDescription
            + compact('name', 'description');
    }

    protected function normalizeModels($models)
    {
        if (empty($models)) {
            $models = ['getResponse'];
        }

        foreach ($models as $k => $model) {
            if (is_numeric($k)) {
                unset($models[$k]);
                $k = $model;
                $models[$k] = ['additionalProperties' => []];
            }

            // Default to XML
            $models[$k]['additionalProperties'] += ['location' => 'json'];

            // Default to object type
            $models[$k] += ['type' => 'object'];
        }

        return $models;
    }

    protected function normalizeOperations($operations, $additionalParameters)
    {
        $serviceName = $this->getServiceName();

        foreach ($operations as $k => $operation) {
            // Support services that pass operations with only parameters
            if (!isset($operation['parameters'])) {
                $operation = ['parameters' => $operation];
            }

            // Inject global parameters (i.e. ApiUser, ApiKey, etc.)
            array_push($operation['parameters'], 'access_token');

            // Normalize parameters
            $operation['parameters'] = $this->normalizeParameters($operation['parameters']);

            // Inject global configuration
            $operations[$k] = $operation + [
                'httpMethod' => 'GET',
                'uri' => '/' . $k,
            ];

            $operations[$k]['uri'] = sprintf('/v%s/%s', self::API_VERSION, str_replace(['v1/', '/v1/'], ['', ''], $operations[$k]['uri']));

            // Add a response model if none is passed
            $operations[$k] += ['responseModel' => 'getResponse', 'name' => $k];
        }

        return $operations;
    }

    protected function normalizeParameters(array $parameters)
    {
        foreach ($parameters as $parameter => $options) {
            if (is_numeric($parameter)) {
                unset($parameters[$parameter]);
                $parameter = $options;
                $parameters[$parameter] = [];
            } else if (is_string($options)) {
                $parameters[$parameter] = [
                    'description' => $options
                ];
            }
            $parameters[$parameter] += ['type' => 'string', 'location' => 'query', 'required' => true];
        }

        return $parameters;
    }

    abstract protected function getServiceDescription();
}
