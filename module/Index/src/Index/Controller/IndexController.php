<?php

namespace Index\Controller;

use MT\Search;
use MT\Controller\MyController;
use My\General;
use Zend\View\Model\JsonModel;
use MT\Business;
use MT\Model;

class IndexController extends MyController
{
    public function indexAction()
    {
        try{
            return [];
        }catch (\Exception $ex){
            echo '<pre>';
            print_r([
                $ex->getCode(),
                $ex->getMessage()
            ]);
            echo '</pre>';
            die();
        }
    }
    public function filesAction(){

    }
}
