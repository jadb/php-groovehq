<?php

namespace GrooveHQ\Service;

class AgentsDescription extends BasicServiceDescription
{

    protected function getServiceDescription()
    {
        return [
            'operations' => [
                'find' => [
                    'summary' => 'Finding one agent',
                    'httpMethod' => 'GET',
                    'uri' => '/agents/{agent_email}',
                    'parameters' => [
                        'agent_email' => [
                            'description' => 'The agent email',
                            'type' => 'string',
                            'location' => 'uri',
                        ],
                    ]
                ],
            ]
        ];
    }

}
