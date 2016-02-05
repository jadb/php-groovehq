<?php

namespace GrooveHQ\Service;

class MailboxesDescription extends BasicServiceDescription
{

    protected function getServiceDescription()
    {
        return [
            'operations' => [
                'mailboxes' => [
                    'summary' => 'Listing mailboxes',
                    'httpMethod' => 'GET',
                    'uri' => '/mailboxes',
                    'parameters' => [],
                ],
                'folders' => [
                    'summary' => 'Listing mailboxes',
                    'httpMethod' => 'GET',
                    'uri' => '/mailboxes',
                    'parameters' => [
                        'mailbox' => [
                            'description' => 'The ID or email address of a Mailbox to filter by',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query'
                        ],
                    ],
                ]
            ]
        ];
    }

}
