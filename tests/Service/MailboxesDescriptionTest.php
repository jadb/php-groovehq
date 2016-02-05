<?php

namespace GrooveHQ\Test\Service;

use GrooveHQ\Service\MailboxesDescription;

class MailboxesDescriptionTest extends \PHPUnit_Framework_TestCase
{

    public function testMailboxesDescription()
    {
        $messages = new MailboxesDescription(['token' => 'someToken']);

        $operations = $messages->getOperations();

        $expected = ['mailboxes', 'folders'];
        $result = array_keys($operations);
        $this->assertEquals($expected, $result);

        $expected = ['access_token'];
        $result = array_keys($operations['mailboxes']['parameters']);
        $this->assertEquals($expected, $result);

        $expected = ['mailbox', 'access_token'];
        $result = array_keys($operations['folders']['parameters']);
        $this->assertEquals($expected, $result);
    }

}
