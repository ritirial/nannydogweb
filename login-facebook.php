<?php
    session_start();

    require 'vendor/autoload.php';

    use Facebook\Facebook;
    use Facebook\FacebookResponse;
    use Facebook\GraphNodes\GraphUser;
    use Facebook\Exceptions\FacebookSDKException;
    use Facebook\Exceptions\FacebookResponseException;

    //Configurarción de la App ID y la App secret key
    $facebook = new Facebook([
        'app_id' => '1213057995454751',
        'app_secret' => 'ffea5291aba5446cfc89f3a8332b72a7',
        'default-graph_version' => 'v2.2'
    ]);

    $helper = $facebook->getRedirectLoginHelper('login-facebook.php');

    $permissions = ['public_profile', 'email'];
    $loginUrl = $helper->getLoginUrl('http://localhost/nannydogbeta/fb-callback.php', $permissions);

    header ("Location: $loginUrl");
    
?>