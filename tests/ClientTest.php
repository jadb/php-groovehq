<?php

namespace GrooveHQ\Test;

use Mockery as m;
use GrooveHQ\Client;
use GrooveHQ\Service\TicketsDescription;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Command\Guzzle\Description as GuzzleHttpDescription;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $token = '41529cf5de0f4daa10098ff4881521c0cfea8b127d8e11bc5cc2cadb974e9a72';

    public function testValidCall()
    {
        $gh = $this->getMock('GrooveHQ\Client', ['init'], [$this->token]);

        $gh->expects($this->once())
            ->method('init')
            ->with(new GuzzleHttpClient(), new TicketsDescription([]), ['defaults' => ['access_token' => $this->token]]);

        $gh->tickets();
    }

}
