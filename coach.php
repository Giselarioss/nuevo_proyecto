<?php

if($_POST && isset($_FILES['archivo'])) {
    $recipient_email = 'gisee_rios@hotmail.com'; //Direccion de correo de quien recibe el mail
    $subject         = "Coaches CV";
       
    //Capturo los datos enviados por POST 
    $from_email     = filter_var($_POST["email"], FILTER_SANITIZE_STRING); 
    $sender_name    = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
    $reply_to_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); 
    $experiencia    = filter_var($_POST["experiencia"], FILTER_SANITIZE_STRING); 
    $pais           = filter_var($_POST["pais"], FILTER_SANITIZE_STRING); 
    $url            = filter_var($_POST["url"], FILTER_SANITIZE_STRING); 
    $telefono       = filter_var($_POST["telefono"], FILTER_SANITIZE_STRING); 
    $mensaje        = filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING); 
   
    //Armo el cuerpo del mensaje    
    $message = "Nombre: " . $sender_name . "\n";
    $message = $message . "Email: " . $from_email . "\n";
    $message = $message . "Telefono: " . $telefono . "\n";
    $message = $message . "Pais: " . $pais . "\n";
    $message = $message . "Años de experiencia:  " . $experiencia. "\n";
    $message = $message . "LinkedIn:  " . $url . "\n";
    $message = $message . "Mensaje:  " . $mensaje . "\n";
    $message = $message  ."Enviado el: ". date('d/m/Y', time());
    

    
   
    //Obtener datos del archivo subido 
    $file_tmp_name    = $_FILES['archivo']['tmp_name'];
    $file_name        = $_FILES['archivo']['name'];
    $file_size        = $_FILES['archivo']['size'];
    $file_type        = $_FILES['archivo']['type'];
    $file_error       = $_FILES['archivo']['error'];
   
    if($file_error > 0)
    {
        die('Error al subir el archivo. No se adjunto ningun archivo');
    }
       
    //Leer el archivo y codificar el contenido para armar el cuerpo del email
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));
   
    $boundary = md5("pera");
  
    //Encabezados
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "From:".$from_email."\r\n"; 
    $headers .= "Reply-To: ".$reply_to_email."" . "\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
           
    //Texto plano
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
    $body .= chunk_split(base64_encode($message)); 
           
    //Adjunto
    $body .= "--$boundary\r\n";
    $body .="Content-Type: $file_type; name=".$file_name."\r\n";
    $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
    $body .="Content-Transfer-Encoding: base64\r\n";
    $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
    $body .= $encoded_content; 
       
    //Enviar el mail
    $sentMail = @mail($recipient_email, $subject, $body, $headers);
   
}
header('Location:exito.html');    


//Redireccion al haber enviado el form

?>
