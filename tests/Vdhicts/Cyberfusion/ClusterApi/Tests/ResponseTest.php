<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Tests;

use PHPUnit\Framework\TestCase;
use Vdhicts\Cyberfusion\ClusterApi\Response;

class ResponseTest extends TestCase
{
    public function testResponse()
    {
        $response = new Response(200, 'Test', ['data' => 'ok']);

        $this->assertSame(200, $response->getStatusCode());
        $this->assertTrue($response->isSuccess());
        $this->assertSame('Test', $response->getStatusMessage());
        $this->assertArrayHasKey('data', $response->getData());
        $this->assertSame('ok', $response->getData('data'));
    }
}
