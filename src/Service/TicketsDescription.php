<?php

namespace GrooveHQ\Service;

class TicketsDescription extends BasicServiceDescription
{

    protected function getServiceDescription()
    {
        return [
            'operations' => [
                'create' => [
                    'summary' => 'Creating a new ticket',
                    'httpMethod' => 'POST',
                    'uri' => '/tickets',
                    'parameters' => [
                        'assigned_group' => [
                            'description' => 'The name of the assigned group',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'postField',
                        ],
                        'assignee' => [
                            'description' => 'The email of the agent to assign the ticket to',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'postField',
                        ],
                        'body' => [
                            'description' => 'The body of the first comment to add to the ticket',
                            'type' => 'string',
                            'location' => 'postField',
                        ],
                        'note' => [
                            'description' => 'When creating a ticket from an agent, should the message body be added as a private note',
                            'type' => 'boolean',
                            'required' => false,
                            'location' => 'postField',
                            'default' => false,
                        ],
                        'send_copy_to_customer' => [
                            'description' => 'When creating a ticket from an agent, should the message be emailed to the customer',
                            'type' => 'boolean',
                            'required' => false,
                            'location' => 'postField',
                            'default' => false,
                        ],
                        'from' => [
                            'description' => 'The email address of the agent or customer who sent the ticket or hash of customer attributes (defined below)',
                            'type' => ['string', 'object'],
                            'location' => 'postField',
                        ],
                        'state' => [
                            'description' => 'The ticket state. Allowed states are: "unread", "opened", "follow_up", "pending", "closed", "spam"',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'postField',
                            'default' => 'unread',
                        ],
                        'tags' => [
                            'description' => 'A list of tag names',
                            'type' => 'array',
                            'required' => false,
                            'location' => 'postField',
                        ],
                        'to' => [
                            'description' => 'The email address of the customer or mailbox that the ticket is addressed to or a hash of customer attributes (defined below)',
                            'type' => ['string', 'object'],
                            'location' => 'postField',
                        ],
                    ]
                ],
                'list' => [
                    'summary' => 'Listing tickets',
                    'httpMethod' => 'GET',
                    'uri' => 'tickets',
                    'parameters' => [
                        'assignee' => [
                            'description' => 'The email address of the assignee or "unassigned" to find all unassigned tickets',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query',
                        ],
                        'customer' => [
                            'description' => 'Returns tickets belonging to the specified customer',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query',
                        ],
                        'page' => [
                            'description' => 'The page number',
                            'type' => 'number',
                            'required' => false,
                            'location' => 'query',
                            'default' => 1,
                        ],
                        'per_page' => [
                            'description' => 'The number of messages to return per page (max 50)',
                            'type' => 'number',
                            'required' => false,
                            'location' => 'query',
                            'default' => 25,
                            'maximum' => 50,
                        ],
                        'state' => [
                            'description' => 'Returns tickets with the specified state only',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query',
                            'enum' => ['unread', 'opened', 'follow_up', 'pending', 'closed', 'spam'],
                        ],
                    ],
                ],
                'count' => [
                    'summary' => 'Listing ticket counts',
                    'httpMethod' => 'GET',
                    'uri' => 'tickets/count',
                    'parameters' => [
                        'mailbox' => [
                            'description' => 'The email or ID of a mailbox to filter by',
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query',
                        ],
                    ],
                ],
                'find' => [
                    'summary' => 'Finding one ticket',
                    'httpMethod' => 'GET',
                    'uri' => '/tickets/{ticket_number}',
                    'parameters' => [
                        'ticket_number' => [
                            'description' => 'The ticket number',
                            'type' => 'number',
                            'location' => 'uri',
                        ],
                    ]
                ],
                'assignee' => [
                    'summary' => 'Finding a ticket\'s assignee',
                    'httpMethod' => 'GET',
                    'uri' => '/tickets/{ticket_number}/assignee',
                    'parameters' => [
                        'ticket_number' => [
                            'description' => 'The ticket number',
                            'type' => 'number',
                            'location' => 'uri',
                        ],
                    ]
                ],
                'state' => [
                    'summary' => 'Finding a ticket state',
                    'httpMethod' => 'GET',
                    'uri' => '/tickets/{ticket_number}/state',
                    'parameters' => [
                        'ticket_number' => [
                            'description' => 'The ticket number',
                            'type' => 'number',
                            'location' => 'uri',
                        ],
                    ]
                ],
                'update' => [
                    'summary' => 'Updating a ticket state',
                    'httpMethod' => 'PUT',
                    'uri' => '/tickets/{ticket_number}/state',
                    'parameters' => [
                        'ticket_number' => [
                            'description' => 'The ticket number',
                            'type' => 'number',
                            'location' => 'uri',
                        ],
                        'state' => [
                            'description' => 'The new ticket state',
                            'type' => 'string',
                            'location' => 'json',
                            'enum' => ['unread', 'opened', 'follow_up', 'pending', 'closed', 'spam'],
                        ],
                    ]
                ],
            ]
        ];
    }

}
