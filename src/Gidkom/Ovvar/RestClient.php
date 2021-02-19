<?php

namespace Gidkom\Ovvar;

use GuzzleHttp\Client;
use Gidkom\Ovvar\Voucher;

class RestClient
{
    private $client;
    private $apiKey;
    const BASE_URI = 'https://api.ovvar.com';

    function __construct($apiKey)
	{
        $this->apiKey = $apiKey;
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => self::BASE_URI
        ]);
	}

    public function request($type, $endpoint, $params=[])
    {
        $headers = ['Authorization' => 'Api-Key ' . $this->apiKey];
        try {
        	$result = $this->client->request($type, $endpoint, ['json' => $params, 'headers' => $headers]);
        } catch (\Exception $e) {
        	return  ['code' => $e->getCode(), 'status'=>false, 'data'=>['message'=>$e->getResponse()->getBody()->getContents()]];
        }
	        
        
        if ($result->getStatusCode() == 200 || $result->getStatusCode() == 201) {
            return ['code' => $result->getStatusCode(), 'status'=>true, 'data'=>json_decode($result->getBody())];
        }
        return ['code' => $result->getStatusCode(), 'status'=>false, 'data'=>json_decode($result->getBody())];
    	
    }
}
