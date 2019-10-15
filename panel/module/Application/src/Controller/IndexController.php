<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    private $productManager;

    public function __construct($productManager)
    {
        $this->productManager = $productManager;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function productsTableAction()
    {
        $params = $this->params();
        $results = $this->productManager->getTable($params);
        return new JsonModel($results);
    }
}
