<?php

//variables
$nombre = $_POST['nombre'];
$mail = $_POST['email'];
$telefono = $_POST['telefono'];
$experiencia = $_POST ['experiencia'];
$pais = $_POST['pais'];
$url = $_POST['url'];
$archivo = $_POST['archivo'];
$mensaje = $_POST['mensaje'];


$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

// como va a llegar el cuerpo del mail 
$mensaje = "Este mensaje fue enviado por: ". $nombre . ",\r\n";
$mensaje .= "Su mail es: ". $mail . "\r\n";
$mensaje .= "Telefono de contacto: ". $telefono . "\r\n";
$mensaje .= "Experiencia: ". $experiencia . "\r\n";
$mensaje .= "Pais: ". $pais . "\r\n";
$mensaje .= "LinkedIn: ". $url . "\r\n";
$mensaje .= "CV: ". $archivo . "\r\n";
$mensaje .= "Mensaje: ". $_POST['mensaje']. "\r\n";
$mensaje .= "Enviado el: ". date('d/m/Y', time());



$para = 'gisee_rios@hotmail.com';
$asunto = 'Mensaje de Vida coach';

// funcion mail
// 1- a quien le llega el mail
// 2- el asunto
// definir el mensaje
//definir el header
mail($para, $asunto, utf8_decode($mensaje), $header);

//Redireccion al haber enviado el form
header('Location:exito.html');
?>
