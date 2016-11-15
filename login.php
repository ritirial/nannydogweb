
<?php

require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseUser;

    ParseClient::initialize('5MUjnjMwd8whYbxWY2pWqAv0QMZ3MHGStiMqRt3y', 'bvdNyubNuQUFWRWZ3cfFSZpm0q6KvHk5gW2xf2D3', 'xoZNO6TOuIV4kLHvIwTam9tYa2xY9prURzhFyASL');
    ParseClient::setServerURL('https://parseapi.back4app.com', '/');

    $jsondata = array();

    if(isset($_POST['email']) && isset($_POST['password'])) {

        try{
            $user = ParseUser::login($_POST['email'], $_POST['password']);
            $jsondata['success'] = true;
        }catch(ParseException $error){
            $jsondata['success'] = false;
        }
    }

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();