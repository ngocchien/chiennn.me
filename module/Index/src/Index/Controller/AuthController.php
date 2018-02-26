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
use MT\Nosql;

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
            $client = new \Google_Client();
            $client->setClientId($google_config['client_id']);
            $client->setClientSecret($google_config['client_secret']);
            $client->setAccessType("offline");        // offline access
            $client->setIncludeGrantedScopes(true);   // incremental auth
            $client->addScope(\Google_Service_Drive::DRIVE_METADATA_READONLY);
            $client->setRedirectUri('http://dev.chiennn.me/auth/google');
            $client->setApprovalPrompt("force");

            if(!empty($params['code'])){
                $client->authenticate($params['code']);
                $access_token = $client->getAccessToken();

                //write redis info
                $instanceRedis = Nosql\Redis::getInstance('caching');

                $client->setAccessToken($token);

                $drive = new \Google_Service_Drive($client);

                $files = $drive->files->listFiles();

                //$files = $drive->files->listFiles(array())->getItems();
                echo '<pre>';
                print_r($files->getFiles);exit();

                $access_token = $client->getAccessToken();
                print_r($access_token);die();
            }




            $client = new \Google_Client();
            $client->setClientId($google_config['client_id']);
            $client->setClientSecret($google_config['client_secret']);
            $client->setAccessType("offline");
            $client->setApprovalPrompt("force");
            $client->refreshToken($google_config['refresh_token']);
            $token = $client->getAccessToken();

            echo '<pre>';
            print_r($token);
            echo '</pre>';
            die();

            $params = array_merge($this->params()->fromRoute(), $this->params()->fromQuery());
            $google_config = [
                'client_id' => '47246308384-09dceuo2a8usraklmtl6mgbfi0q5ljp8.apps.googleusercontent.com',
                'client_secret' => 'd3NNefkt3ETgbGXdap0hIKLv',
                'refresh_token' => '1/qvdQh4ZAWNGj7McFWxQZ6e_Wh9x84WD8jflAH6Bov8o'
            ];
            $client = new \Google_Client();
            $client->setClientId($google_config['client_id']);
            $client->setClientSecret($google_config['client_secret']);
            $client->setAccessType("offline");        // offline access
            $client->setIncludeGrantedScopes(true);   // incremental auth
            $client->addScope(\Google_Service_Drive::DRIVE_METADATA_READONLY);
            $client->setRedirectUri('http://dev.chiennn.me/auth/google');
            $client->setApprovalPrompt("force");

            if(!empty($params['code'])){

//                z-
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