<?php

namespace App\Importers;

namespace App\Importers;

use GuzzleHttp\Client;

class Admin extends Importer
{
    const ADMIN = 1;

    //Main request settings
    protected $url;
    protected $query;

    public function __construct()
    {
        $this->url = env('ADMIN_IMPORTER_URL');
//        $this->startLogger(self::TDL);
    }

    public function requestProperties()
    {
        $this->query = "";
        $this->query .= "test-properties.json";

        $this->sendRequest();
    }

    public function sendRequest($method = 'GET')
    {
        $client = new Client();

        $response = $client->request($method, $this->url . $this->query);

        $this->setResponse($response);
    }
}
