<?php
    require 'vendor/autoload.php';

    use Facebook\Facebook;
    use Facebook\FacebookResponse;
    use Facebook\GraphNodes\GraphUser;
    use Facebook\Exceptions\FacebookSDKException;
    use Facebook\Exceptions\FacebookResponseException;

    use Parse\ParseClient;
    use Parse\ParseUser;
    use Parse\ParseQuery;
    use Parse\ParseSessionStorage;
    use Parse\ParseFile;

    ob_start();

    session_start();

    ParseClient::initialize('5MUjnjMwd8whYbxWY2pWqAv0QMZ3MHGStiMqRt3y', 'bvdNyubNuQUFWRWZ3cfFSZpm0q6KvHk5gW2xf2D3', 'xoZNO6TOuIV4kLHvIwTam9tYa2xY9prURzhFyASL');
    ParseClient::setServerURL('https://parseapi.back4app.com', '/');

    $facebook = new Facebook([
    'app_id' => '1213057995454751',
    'app_secret' => 'ffea5291aba5446cfc89f3a8332b72a7',
    'default_graph_version' => 'v2.2',
    ]);

    $helper = $facebook->getRedirectLoginHelper();

    try {

        $accessToken = $helper->getAccessToken();
        $response = $facebook->get('/me?fields=first_name,last_name,email,id,name', $accessToken);

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
        try{
            $user = $response->getGraphUser();
            
            $user_id = $user['id'];
            $user_name = $user['name'];
            $user_firstname = $user['first_name'];
            $user_lastname = $user['last_name'];  
            $user_email = $user['email'];
            $user_photo_profile = "https://graph.facebook.com/".$user['id']."/picture?type=large";
            
            echo 'FacebookID: '. $user_id.'<br>';
            echo 'Nombre: '. $user_name.'<br>';
            echo 'Primer nombre: '.$user_firstname.'<br>';
            echo 'Apellido: '.$user_lastname.'<br>';
            echo "Email: ". $user_email.'<br>';
            echo '<img src="https://graph.facebook.com/'.$user['id'].'/picture">';

            $query = ParseUser::query("_User");
            $query->equalTo("username", $user_id);
            $facebook_users = $query->find();
            
            if(sizeof($facebook_users) > 0){

                echo "el usuario existe";
                $person = $facebook_users[0];

                $person_id = $person->getObjectId();
                $person_name = $person->get('username');

                $_SESSION['idUsuario'] = $person_id;
                $_SESSION['usuario'] = $person_name;
                $_SESSION['fb_access_token'] = (string) $accessToken;

                $storage = new ParseSessionStorage();
                ParseClient::setStorage($storage);
        
            } else{

                 echo "el usuario no existe";

                $user = new ParseUser();

                $user->set("name", $user_name);
                $user->set("password", uniqid());
                $user->set("username", $user_id);
                $user->set("email", $user_email);
                $user->set("lastname", $user_lastname);
                $user_photo = ParseFile::createFromFile($user_photo_profile, "photo_profile.png");
                $user_photo->save();
                $user->set("image_profile", $user_photo);

                $_SESSION['idUsuario'] = $person_id;
                $_SESSION['usuario'] = $person_name;
                $_SESSION['fb_access_token'] = (string) $accessToken;

                $storage = new ParseSessionStorage();
                ParseClient::setStorage($storage);

                try {
                    $user->signUp();
                } catch (ParseException $ex) {
                    echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
                }        
            }
            header("Location: http://localhost/nannydogbeta/dashboard.php");
        }catch(Exception $ex){
            echo "Error al validar<br/>";
            echo $ex;
            echo "<br/>";
        }
        ob_end_flush();
?>