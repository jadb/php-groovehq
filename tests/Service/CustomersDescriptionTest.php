<?php

namespace GrooveHQ\Test\Service;

use GrooveHQ\Service\CustomersDescription;

class CustomersDescriptionTest extends \PHPUnit_Framework_TestCase
{

    public function testCustomersDescription()
    {
        $customers = new CustomersDescription(['token' => 'someToken']);

        $operations = $customers->getOperations();

        $expected = ['list', 'find', 'update'];
        $result = array_keys($operations);
        $this->assertEquals($expected, $result);

        $expected = ['page', 'per_page', 'access_token'];
        $result = array_keys($operations['list']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = ['customer_email', 'access_token'];
        $result = array_keys($operations['find']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = [
            'customer_email',
            'email',
            'first_name',
            'last_name',
            'about',
            'twitter_username',
            'title',
            'company_name',
            'phone_number',
            'location',
            'linkedin_username',
            'custom',
            'access_token'
        ];
        $result = array_keys($operations['update']['parameters']);
        $this->assertEquals($expected, $result);
    }

}
