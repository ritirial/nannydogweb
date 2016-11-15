<?php
//session_start();

require 'vendor/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

if(!session_id()) {
  session_start();
}

//Init App con la AppID y la llave secreta de Facebook.
FacebookSession::setDefaultApplication( 'Your APP ID','Your APP Secret' );
//Login Helper con redirección a URI de NannyDog.
    $helper = new FacebookRedirectLoginHelper('../fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // Cuando Facebook retorna un error.
} catch( Exception $ex ) {
  
}
// Checa si ya existe una sesión.
if ( isset( $session ) ) {
  // Se realiza un request de la info del usuario a la API Graph de Facebook.
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // Obtenemos la respuesta devuelta por Graph.
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // Facebook ID del usuario.
 	    $fbfullname = $graphObject->getProperty('name'); //Nombre completo del usuario en Facebook
	    $femail = $graphObject->getProperty('email');    //Facebook email ID

	/* ---- Variables de sesión que corresponden a los datos del usuario -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;

    /* ---- Página a mostrar una vez realizado el inicio de sesión ----*/
  header("Location: index.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>