<?php

namespace Gidkom\Ovvar;

use GuzzleHttp\Client;
use Gidkom\Ovvar\RestClient;

class Voucher
{
    public $apiKey;
    public $testing;
    public $restClient;

    public function __construct($apiKey, $testing = 0) {
        $this->restClient = new RestClient($apiKey, $testing);
    }
    
    public function generate($data)
    {
        return $this->restClient->request('POST', '/api/v1/vouchers/', $data);
    }


    public function validate($voucherPin)
    {
        return $this->restClient->request('POST', '/api/v1/vouchers/validate_voucher/', ['pin' => $voucherPin]);
    }

    public function redeem($voucherPin)
    {
        return $this->restClient->request('POST', '/api/v1/vouchers/redeem/', ['pin' => $voucherPin]);
    }
}
