<?php

namespace GrooveHQ\Test\Service;

use GrooveHQ\Service\AgentsDescription;

class AgentsDescriptionTest extends \PHPUnit_Framework_TestCase
{

    public function testAgentsDescription()
    {
        $agents = new AgentsDescription(['token' => 'someToken']);

        $operations = $agents->getOperations();

        $expected = ['find'];
        $result = array_keys($operations);
        $this->assertEquals($expected, $result);

        $expected = ['agent_email', 'access_token'];
        $result = array_keys($operations['find']['parameters']);
        $this->assertEquals($expected, $result);
    }

}
