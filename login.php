
<?php

require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseUser;

    ParseClient::initialize('5MUjnjMwd8whYbxWY2pWqAv0QMZ3MHGStiMqRt3y', 'bvdNyubNuQUFWRWZ3cfFSZpm0q6KvHk5gW2xf2D3', 'xoZNO6TOuIV4kLHvIwTam9tYa2xY9prURzhFyASL');
    ParseClient::setServerURL('https://parseapi.back4app.com', '/');

    if(isset($_POST['email']) && isset($_POST['password'])) {
        try{
            $user = ParseUser::login($_POST['email'], $_POST['password']);
             echo "Se ha iniciado sesión correctamente.";
        }catch(ParseException $error){
            
        }
    }

?>