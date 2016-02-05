<?php

namespace GrooveHQ\Service;

class MessagesDescription extends BasicServiceDescription
{

    protected function getServiceDescription()
    {
        return [
            'operations' => [
                'list' => [
                    'summary' => 'Listing all messages',
                    'httpMethod' => 'GET',
                    'uri' => '/tickets/{ticket_number}/messages',
                    'parameters' => [
                        'ticket_number' => [
                            'description' => 'The ticket number',
                            'type' => 'string',
                            'location' => 'uri',
                        ],
                        'page' => [
                            'description' => 'The page number',
                            'type' => 'numeric',
                            'required' => false,
                            'location' => 'query',
                            'default' => 1,
                        ],
                        'per_page' => [
                            'description' => 'The number of messages to return per page (max 50)',
                            'type' => 'numeric',
                            'required' => false,
                            'location' => 'query',
                            'default' => 25,
                            'maximum' => 50,
                        ],
                    ],
                ],
                'find' => [
                    'summary' => 'Finding one ticket',
                    'httpMethod' => 'GET',
                    'uri' => '/messages/{id}',
                    'parameters' => [
                        'id' => [
                            'description' => 'The message ID',
                            'type' => 'string',
                            'location' => 'uri',
                        ],
                    ]
                ],
                'create' => [
                    'summary' => 'Creating a new message',
                    'httpMethod' => 'POST',
                    'uri' => '/tickets/{ticket_number}/messages',
                    'parameters' => [
                        'ticket_number' => [
                            'description' => 'The ticket number',
                            'type' => 'string',
                            'location' => 'uri',
                        ],
                        'body' => [
                            'description' => 'The message body',
                            'type' => 'string',
                            'location' => 'postField',
                        ],
                        'note' => [
                            'description' => 'Is the message a private note?',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'postField',
                        ],
                    ]
                ],
                'attachments' => [
                    'summary' => 'Listing attachments',
                    'httpMethod' => 'GET',
                    'uri' => '/attachments',
                    'parameters' => [
                        'message' => [
                            'description' => 'The ID of the message to list attachments for',
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query'
                        ],
                    ],
                ],
            ]
        ];
    }

}
