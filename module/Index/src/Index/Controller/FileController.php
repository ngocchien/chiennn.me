<?php

namespace Index\Controller;

use MT\Controller\MyController;

class FileController extends MyController
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
