<?php

namespace GrooveHQ\Test\Service;

use GrooveHQ\Service\GroupsDescription;

class GroupsDescriptionTest extends \PHPUnit_Framework_TestCase
{

    public function testGroupsDescription()
    {
        $messages = new GroupsDescription(['token' => 'someToken']);

        $operations = $messages->getOperations();

        $expected = ['groups'];
        $result = array_keys($operations);
        $this->assertEquals($expected, $result);

        $expected = ['access_token'];
        $result = array_keys($operations['groups']['parameters']);
        $this->assertEquals($expected, $result);
    }

}
