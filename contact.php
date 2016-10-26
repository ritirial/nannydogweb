<?php
if(isset($_POST['email'])) {
 
    $email_to = "heloelhdez@hotmail.com";
 
    $email_subject = "Contacto vía página web";

 
    function died($error) {
 
        //Manejo de errores al enviar el email.
 
        echo "Lo sentimo, hubo un error al enviar su mensaje. ";
 
        echo "Este es el error: .<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Notificación de error para el desarrollador.<br /><br />";
 
        die();
 
    }
 
     
 
    // Verificamos que los datos existan
     
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message'])) {
 
        died('Lo sentimos pero ha surgido un error con la información proporcionada.');       
 
    }
 
    

    $email_message = "Detalles del mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Mensaje: ".clean_string($message)."\n";

 
	// Header del correo
	 
	$headers = 'De: '.$email."\r\n".
	 
	'Reenviar a: '.$email."\r\n" .
	 
	'X-Mailer: PHP/' . phpversion();
	 
	@mail($email_to, $email_subject, $email_message, $headers);  
    }
?>