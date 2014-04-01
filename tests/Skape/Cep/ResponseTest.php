<?php

use Skape\Cep\Response;

class SkapeCepResponse extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Skape\Cep\Response
     */
    protected $cepResponse;

    public function setUp()
    {
        $this->cepResponse = new Response();
    }

    public function testInitialResponseValues()
    {
        $this->assertNull($this->cepResponse->city);
        $this->assertNull($this->cepResponse->neighborhood);
        $this->assertNull($this->cepResponse->street);
        $this->assertNull($this->cepResponse->state);
        $this->assertNull($this->cepResponse->country);
        $this->assertNull($this->cepResponse->zipcode);
    }

} 