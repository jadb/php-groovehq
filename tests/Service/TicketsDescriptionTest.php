<?php

namespace GrooveHQ\Test\Service;

use GrooveHQ\Service\TicketsDescription;

class TicketsDescriptionTest extends \PHPUnit_Framework_TestCase
{

    public function testTicketsDescription()
    {
        $tickets = new TicketsDescription(['token' => 'someToken']);

        $operations = $tickets->getOperations();

        $expected = ['create', 'list', 'find', 'state', 'update'];
        $result = array_keys($operations);
        $this->assertEquals($expected, $result);

        $expected = ['assigned_group', 'assignee', 'body', 'note', 'send_copy_to_customer', 'from', 'state', 'tags', 'to', 'access_token'];
        $result = array_keys($operations['create']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = ['assignee', 'customer', 'page', 'per_page', 'state', 'access_token'];
        $result = array_keys($operations['list']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = ['ticket_number', 'access_token'];
        $result = array_keys($operations['find']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = ['ticket_number', 'access_token'];
        $result = array_keys($operations['state']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = ['ticket_number', 'state', 'access_token'];
        $result = array_keys($operations['update']['parameters']);
        $this->assertEquals($expected, $result);
    }

}
