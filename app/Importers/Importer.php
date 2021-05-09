<?php

namespace App\Importers;

use App\Models\Importers\Log;
use Carbon\Carbon;

abstract class Importer
{
    protected $response;
    public $importerId;
    protected $logger;

    abstract public function sendRequest($method);

    protected function setResponse($response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getJsonResponse()
    {
        return json_decode($this->response->getBody()->getContents());
    }

    public function convertPrice($price)
    {
        return round((double)$price, 2);
    }

//    public function startLogger($importId)
//    {
//        $this->logger = Log::firstOrCreate([
//            'import_id' => $importId,
//            'import_date' => Carbon::now()->toDateString()
//        ], [
//            'import_id' => $importId,
//            'import_date' => Carbon::now(),
//            'started_at' => Carbon::now()
//        ]);
//    }

//    public function setLoggerManufacturersCount($count)
//    {
//        $this->logger->update([
//            'added_manufacturers_count' => $this->logger->added_manufacturers_count += $count
//        ]);
//    }
//
//    public function setLoggerCategoriesCount($count)
//    {
//        $this->logger->update([
//            'added_categories_count' => $this->logger->added_categories_count += $count
//        ]);
//    }
//
//    public function setLoggerProductsCount($count)
//    {
//        $this->logger->update([
//            'added_products_count' => $this->logger->added_products_count += $count
//        ]);
//    }
//
//    public function startMediaLogger()
//    {
//        $this->logger->update([
//            'media_started_at' => Carbon::now()
//        ]);
//    }
//
//    public function stopMediaLogger()
//    {
//        $this->logger->update([
//            'media_finished_at' => Carbon::now()
//        ]);
//    }
//
//    public function stopLogger()
//    {
//        $this->logger->update([
//            'finished_at' => Carbon::now()
//        ]);
//    }
//
//    public function getLogger()
//    {
//        return $this->logger;
//    }
}


