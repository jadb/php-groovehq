<?php

namespace GrooveHQ\Service;

class GroupsDescription extends BasicServiceDescription
{

    protected function getServiceDescription()
    {
        return [
            'operations' => [
                'groups' => [
                    'summary' => 'Listing groups',
                    'httpMethod' => 'GET',
                    'uri' => '/groups',
                    'parameters' => [],
                ],
            ]
        ];
    }

}
