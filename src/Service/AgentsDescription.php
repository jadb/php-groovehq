<?php

namespace GrooveHQ\Service;

class AgentsDescription extends BasicServiceDescription
{

    protected function getServiceDescription()
    {
        return [
            'operations' => [
                'list' => [
                    'summary' => 'Listing agents',
                    'httpMethod' => 'GET',
                    'uri' => '/agents',
                    'parameters' => [
                        'group' => [
                            'description' => 'The ID of a Group to filter by',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query'
                        ]
                    ],
                ],
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
