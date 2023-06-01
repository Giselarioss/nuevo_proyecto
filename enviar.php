<?php

//variables

$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];
$problemas = $_POST ['problemas'];
$mensaje = $_POST['mensaje'];

//texto plano
$header .= "Content-Type: text/plain";



// como va a llegar el cuerpo del mail 
$mensaje = "Este mensaje fue enviado por:" . $nombre . ",\r\n";
$mensaje .= "Su mail es: ". $mail . "\r\n";
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
mail($para, $asunto, utf8_decode($mensaje), $header);

//Redireccion al haber enviado el form
header("Location:exito.html");
?>
