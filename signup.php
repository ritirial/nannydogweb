
<?php

require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseUser;

    ParseClient::initialize('5MUjnjMwd8whYbxWY2pWqAv0QMZ3MHGStiMqRt3y', 'bvdNyubNuQUFWRWZ3cfFSZpm0q6KvHk5gW2xf2D3', 'xoZNO6TOuIV4kLHvIwTam9tYa2xY9prURzhFyASL');
    ParseClient::setServerURL('https://parseapi.back4app.com', '/');

    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation']) && isset($_POST['name']) && isset($_POST['lastname'])) {
        $user = new ParseUser();
        $user->set("username", $_POST['email']);
        $user->set("password", $_POST['password']);
        $user->set("email", $_POST['email']);
        $user->set("name", $_POST['name']);
        $user->set("lastname", $_POST['lastname']);

        try {
            $user->signUp();
        } catch (ParseException $ex) {
            echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
        }    
    }

?>