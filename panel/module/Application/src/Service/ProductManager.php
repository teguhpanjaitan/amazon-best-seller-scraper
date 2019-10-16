<?php

namespace Application\Service;

use Application\Entity\Product as ProductEntity;

class ProductManager
{
    private $productMapper;

    public function __construct($productMapper)
    {
        $this->productMapper = $productMapper;
    }

    public function getTable($controllerParams)
    {
        $params = $this->getParams($controllerParams);
        $results = $this->productMapper->getTable($params);
        $results['draw'] = intval($params['draw']) + 1;
        
        return $this->format($results);
    }

    public function format(array $data)
    {
        $temp = array();
        foreach ($data["data"] as $value) {
            $t = array();
            $t[] = $value->getBestSellerRank();
            $t[] = $value->getBestSellerRank();
            $t[] = $value->getAsin();
            $t[] = $value->getTitle();
            $t[] = $value->getPrice();
            $t[] = $value->getRatings();
            $t[] = $value->getAvgRating();
            $temp[] = $t;
        }

        return array("draw" => $data['draw'], "recordsTotal" => $data['total'], "recordsFiltered" => $data['total'], "data" => $temp);
    }

    private function getParams($params)
    {
        $var = array();
        $var['draw'] = $params->fromQuery("draw", "1");
        $var['length'] = $params->fromQuery("length", "10");
        $var['start'] = $params->fromQuery("start", "");
        $order = $params->fromQuery("order", "");
        $var['col'] = isset($order[0]['column']) ? $order[0]['column'] : "";
        $var['dir'] = isset($order[0]['dir']) ? $order[0]['dir'] : "";
        $var['search'] = $params->fromQuery("search", ['value' => '']);
        return $var;
    }
}
