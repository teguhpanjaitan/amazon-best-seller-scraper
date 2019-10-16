<?php

namespace Application\Service;

class ProductManager
{
    private $productMapper;
    private $productLogMapper;

    public function __construct($productMapper,$productLogMapper)
    {
        $this->productMapper = $productMapper;
        $this->productLogMapper = $productLogMapper;
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
            $t[] = $this->get30DaysHistory($value->getAsin());
            $t[] = $value->getAsin();
            $t[] = $this->getTitle($value->getTitle(),$value->getLink());
            $t[] = $value->getPrice();
            $t[] = $value->getRatings();
            $t[] = $value->getAvgRating();
            $temp[] = $t;
        }

        return array("draw" => $data['draw'], "recordsTotal" => $data['total'], "recordsFiltered" => $data['total'], "data" => $temp);
    }

    private function get30DaysHistory($asin){
        $results = $this->productLogMapper->getProductHistoryByASIN($asin);

        $return = [];
        foreach($results as $result){
            $temp = [];
            $temp['price'] = $result->getPrice();
            $temp['best_seller_rank'] = $result->getBestSellerRank();
            $temp['ratings'] = $result->getRatings();
            $temp['avg_rating'] = $result->getAvgRating();
            $return[] = $temp;
        }

        return json_encode($return);
    }

    private function getTitle($title,$link){
        return "<a href='$link' target='_blank'>$title</a>";
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
