<?php

namespace GrooveHQ\Service;

class CustomersDescription extends BasicServiceDescription
{

    protected function getServiceDescription()
    {
        return [
            'operations' => [
                'list' => [
                    'summary' => 'Listing all customers',
                    'httpMethod' => 'GET',
                    'uri' => '/customers',
                    'parameters' => [
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
                    'uri' => '/customers/{customer_email}',
                    'parameters' => [
                        'customer_email' => [
                            'description' => 'The customer email',
                            'type' => 'string',
                            'location' => 'uri',
                        ],
                    ]
                ],
                'update' => [
                    'summary' => 'Updating a customer',
                    'httpMethod' => 'PUT',
                    'uri' => '/customers/{customer_email}',
                    'parameters' => [
                        'customer_email' => [
                            'description' => 'The customer email',
                            'type' => 'string',
                            'location' => 'uri',
                        ],
                        'email' => [
                            'description' => 'The customer email',
                            'type' => 'string',
                            'location' => 'json',
                        ],
                        'first_name' => [
                            'description' => 'The customer first name',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'last_name' => [
                            'description' => 'The customer last name',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'about' => [
                            'description' => 'Some text about the customer',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'twitter_username' => [
                            'description' => 'The customer twitter username',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'title' => [
                            'description' => 'The customer title',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'company_name' => [
                            'description' => 'The customer company name',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'phone_number' => [
                            'description' => 'The customer phone number',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'location' => [
                            'description' => 'The customer location',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'linkedin_username' => [
                            'description' => 'The customer linkedin username',
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'custom' => [
                            'description' => 'Any additional customer attributes',
                            'type' => 'array',
                            'location' => 'json',
                            'required' => false,
                        ],
                    ]
                ],
            ]
        ];
    }

}
