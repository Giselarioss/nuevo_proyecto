<?php
$problemas = $_POST ['problemas']
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];
$mensaje = $_POST['mensaje'];

$header = 'From:' , $mail , "\r\n";
$header ,= "X-Mailer: PHP/" , phpversion(), "\r\n";
$header ,= "Mime-Version: 1.0 \r\n" ;
$header ,= "Content-Type: text/plain";

$message = "Este mensaje fue enviado por: ", $nombre, "\r\n";
$message ,= "Su mail es: ", $mail, "\r\n";
$message ,= "Telefono de contacto: ", $telefono, "\r\n";
$message ,= "Pais: ", $pais, "\r\n";
$message ,= " Necesita apoyo en: ", $problemas, "\r\n";
$message ,= "Mensaje: ", $_POST['messsage'], "\r\n";
$message ,= "Enviado el: ", date('d/m/y', time());

$para = 'contacto@vidacoaches.com';
$asunto = 'Mensaje de Vida coach';

mail($para,$asunto,utf8_decode($message),$header);
header("Location:index.html");
?>
