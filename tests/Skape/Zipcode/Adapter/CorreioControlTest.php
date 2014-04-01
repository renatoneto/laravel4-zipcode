<?php

use Skape\Zipcode\Adapter\CorreioControlAdapter;
use Mockery as m;

class CorreioControlAdapterTest extends PHPUnit_Framework_TestCase
{

    protected function getErrorResponse()
    {
        return new \GuzzleHttp\Message\Response(200, [], \GuzzleHttp\Stream\Stream::factory('correiocontrolcep({"erro":true});'));
    }

    protected function getValidResponse()
    {
        return new \GuzzleHttp\Message\Response(200, [], \GuzzleHttp\Stream\Stream::factory('{"bairro": "Acapulco", "logradouro": "Rua Sete", "cep": "11445110", "uf": "SP", "localidade": "Guaruj\u00e1"}'));
    }

    protected function mockClient($response)
    {
        $client = m::mock('\GuzzleHttp\Client');
        $client->shouldReceive('get')->andReturn($response);

        return $client;
    }

    public function testGetClient()
    {
        $client = $this->mockClient($this->getErrorResponse());

        $adapter = new CorreioControlAdapter($client);
        $this->assertEquals($adapter->getClient(), $client);
    }

    /**
     * @expectedException \Skape\Zipcode\Exception
     * @expectedExceptionMessage Zipcode not found
     */
    public function testInvalidResponse()
    {
        $client = $this->mockClient($this->getErrorResponse());

        $adapter = new CorreioControlAdapter($client);
        $adapter->find('11445110');
    }

    public function testValidResponse()
    {
        $client = $this->mockClient($this->getValidResponse());

        $response = new \Skape\Zipcode\Response();
        $response->city = 'Guarujá';
        $response->neighborhood = 'Acapulco';
        $response->street = 'Rua Sete';
        $response->zipcode = '11445110';
        $response->state = 'SP';
        $response->country = 'Brasil';

        $adapter = new CorreioControlAdapter($client);
        $this->assertEquals($adapter->find('11445110'), $response);
    }

} 