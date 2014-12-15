<?php

namespace GrooveHQ\Test\Service;

use GrooveHQ\Service\MessagesDescription;

class MessagesDescriptionTest extends \PHPUnit_Framework_TestCase
{

    public function testMessagesDescription()
    {
        $messages = new MessagesDescription(['token' => 'someToken']);

        $operations = $messages->getOperations();

        $expected = ['list', 'find', 'create'];
        $result = array_keys($operations);
        $this->assertEquals($expected, $result);

        $expected = ['ticket_number', 'page', 'per_page', 'access_token'];
        $result = array_keys($operations['list']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = ['id', 'access_token'];
        $result = array_keys($operations['find']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = ['ticket_number', 'body', 'note', 'access_token'];
        $result = array_keys($operations['create']['parameters']);
        $this->assertEquals($expected, $result);
    }

}
