<?php
/**
 * Created by PhpStorm.
 * User: chiennn
 * Date: 01/09/2017
 * Time: 12:19
 */

namespace Index\Controller;

use MT\Controller\MyController;
use Google;

class AuthController extends MyController
{
    public function indexAction(){
        echo '<pre>';
        print_r(111);
        echo '</pre>';
        die();
    }

    public function googleAction(){
        try{
            $params = array_merge($this->params()->fromRoute(), $this->params()->fromQuery());
            $google_config = [
                'client_id' => '47246308384-09dceuo2a8usraklmtl6mgbfi0q5ljp8.apps.googleusercontent.com',
                'client_secret' => 'd3NNefkt3ETgbGXdap0hIKLv'
            ];
            if(!empty($params['code'])){

            }
            $client = new \Google_Client();
            $client->setClientId($google_config['client_id']);
            $client->setClientSecret($google_config['client_secret']);
            $client->setAccessType("offline");        // offline access
            $client->setIncludeGrantedScopes(true);   // incremental auth
            $client->addScope(\Google_Service_Drive::DRIVE_METADATA_READONLY);
            $client->setRedirectUri('http://dev.chiennn.me/auth/google');
            $client->setApprovalPrompt("force");
            echo '<pre>';
            print_r($client->createAuthUrl());
            echo '</pre>';
            die();
            $client->refreshToken($google_config['refresh_token']);
            $new_token = $client->getAccessToken();
            echo '<pre>';
            print_r($params);
            echo '</pre>';
            die();
        }catch (\Exception $exc){
            echo '<pre>';
            print_r([
                $exc->getCode(),
                $exc->getMessage()
            ]);
            echo '</pre>';
            die();
        }

    }
}