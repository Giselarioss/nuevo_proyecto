<?php

//variables

$nombre                  = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$from_email              = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$reply_to_email          = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$telefono                = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
$pais                    = filter_var($_POST['pais'], FILTER_SANITIZE_STRING);
$problemas               = filter_var($_POST ['problemas'], FILTER_SANITIZE_STRING);
$mensaje                 = filter_var( $_POST['mensaje'], FILTER_SANITIZE_STRING);

$boundary                = md5("pera");

//Encabezados
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "From:".$from_email."\r\n"; 
$headers .= "Reply-To: ".$reply_to_email."" . "\r\n";
$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 




// como va a llegar el cuerpo del mail 
$mensaje = "Este mensaje fue enviado por: " . $nombre . ",\r\n";
$mensaje .= "Su mail es: ". $_POST['email'] . "\r\n";
$mensaje .= "Telefono de contacto: ". $telefono . "\r\n";
$mensaje .= "Pais: ". $pais . "\r\n";
$mensaje .= " Necesita apoyo en: ". $problemas . "\r\n";
$mensaje .= "Mensaje: ". $_POST['mensaje'] . "\r\n";
$mensaje .= "Enviado el: ". date('d/m/Y', time());

$para = 'contacto@vidacoaches.com';
$asunto = 'Mensaje de Vida coach';

// funcion mail
// 1- a quien le llega el mail
// 2- el asunto
// definir el mensaje
//definir el header
mail($para, $asunto, utf8_decode($mensaje), $headers);

//Redireccion al haber enviado el form
header('Location:exito.html');
?>
