<?php

//variables
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$telefono = $_POST['telefono'];
$experiencia = $_POST ['experiencia'];
$pais = $_POST['pais'];
$genero = $_POST['genero'];
$url = $_POST['url'];
$archivo = $_POST['archivo'];
$problemas = $_POST ['problemas']
$mensaje = $_POST['mensaje'];



// como va a llegar el cuerpo del mail 
$mensaje = "Este mensaje fue enviado por: ", $nombre, "\r\n";
$mensaje ,= "Su mail es: ", $mail, "\r\n";
$mensaje ,= "Telefono de contacto: ", $telefono, "\r\n";
$mensaje ,= "Genero: ", $genero , "\r\n";
$mensaje ,= "Experiencia: ", $experienica, "\r\n";
$mensaje ,= "Pais: ", $pais, "\r\n";
$mensaje ,= "LinkedIn: ", $url , "\r\n";
$mensaje ,= "CV: ", $archivo , "\r\n";
$mensaje ,= " Tema en el que puedo ayudar: ", $problemas, "\r\n";
$mensaje ,= "Mensaje: ", $_POST['mensaje'], "\r\n";
$mensaje ,= "Enviado el: ", date('d/m/y', time());

$para = 'contacto@vidacoaches.com';
$asunto = 'Mensaje de Vida coach';

// funcion mail
// 1- a quien le llega el mail
// 2- el asunto
// definir el mensaje
//definir el header
mail($para,$asunto,utf8_decode($mensaje),$header);

//Redireccion al haber enviado el form
header("Location:exito.html");
?>