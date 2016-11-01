<?php
    session_start();

    require 'vendor/autoload.php';

    use Facebook\Facebook;
    use Facebook\FacebookResponse;
    use Facebook\GraphNodes\GraphUser;
    use Facebook\Exceptions\FacebookSDKException;
    use Facebook\Exceptions\FacebookResponseException;

    $facebook = new Facebook([
    'app_id' => '1213057995454751',
    'app_secret' => 'ffea5291aba5446cfc89f3a8332b72a7',
    'default_graph_version' => 'v2.2',
    ]);

    $helper = $facebook->getRedirectLoginHelper();

    try {

        $accessToken = $helper->getAccessToken();
        $response = $facebook->get('/me?fields=first_name,last_name,email,id,name,age_range', $accessToken);

    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    if (! isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
    }

    // Logged in

    $user = $response->getGraphUser();

    echo 'FacebookID: '.$user['id'].'<br>';
    echo 'Nombre: '.$user['name'].'<br>';
    echo 'Primer nombre: '.$user['first_name'].'<br>';
    echo 'Apellido: '.$user['last_name'].'<br>';
    echo "Email: ".$user['email'].'<br>';
    echo "Edad: ".$user['age_range'].'<br>';
    echo '<img src="https://graph.facebook.com/'.$user['id'].'/picture">';

    $_SESSION['fb_access_token'] = (string) $accessToken;


?>