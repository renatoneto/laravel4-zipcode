<?php
namespace Skape\Zipcode\Adapter;

use GuzzleHttp\Exception\ParseException;
use Skape\Zipcode\Exception;
use Skape\Zipcode\Response;

class CorreioControlAdapter implements AdapterInterface
{

    protected $url = 'http://cep.correiocontrol.com.br/%s.json';
    protected $client;

    public function __construct(\GuzzleHttp\ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param $zipcode
     * @return \Skape\Zipcode\Response
     */
    public function find($zipcode)
    {
        $zipcode      = trim(str_replace(['.', '-', '_'], null, $zipcode));
        $httpResponse = $this->getClient()->get(sprintf($this->url, $zipcode));

        try {

            $json = $httpResponse->json();

            $response = new Response();
            $response->country      = 'Brasil';
            $response->neighborhood = (isset($json['bairro'])) ? $json['bairro'] : null;
            $response->city         = (isset($json['localidade'])) ? $json['localidade'] : null;
            $response->street       = (isset($json['logradouro'])) ? $json['logradouro'] : null;
            $response->zipcode      = (isset($json['cep'])) ? $json['cep'] : null;
            $response->state        = (isset($json['uf'])) ? $json['uf'] : null;

            return $response;

        } catch (ParseException $e) {
            throw new Exception('Zipcode not found');
        }

    }

} 