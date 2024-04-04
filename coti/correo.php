<!-- 
// $name = $_POST['nombre'];
// $apellido = $_POST['apellido'];
// $mail = $_POST['correo_electronico'];
// $phone = $_POST['telefono'];
// $message = $_POST['message'];

// $header = 'From: ' . $mail . " \r\n";
// $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
// $header .= "Mime-Version: 1.0 \r\n";
// $header .= "Content-Type: text/plain";

// $message = "Este mensaje fue enviado por: " . $name . " \r\n";
// $message .= "Su e-mail es: " . $mail . " \r\n";
// $message .= "Teléfono de contacto: " . $phone . " \r\n";
// $message .= "Mensaje: " . $_POST['message'] . " \r\n";
// $message .= "Enviado el: " . date('d/m/Y', time());

// $para = 'escribeaquitucorreo@hotmail.com';
// $asunto = 'Mensaje de... (Escribe como quieres que se vea el remitente de tu correo)';

// mail($para, $asunto, utf8_decode($message), $header);

// header("Location:index.html");
//  -->

<?php
$destino = "vejed18536@adstam.com";
$nombre = $_POST["nombre"];
$correo = $_POST["correo_electronico"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["asunto"];
$contenido = "Nombre: " . $nombre . "\n Correo:" . $correo . "\n Telefono:" . $telefono . "\n Mensaje:" . $mensaje;

if (mail($destino, "Contacto", $contenido)) {
    $mensaje = "¡Mensaje enviado! Nos pondremos en contacto contigo pronto.";
} else {
    $mensaje = "Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo.";
}

header("Location: conT.html?mensaje=" . urlencode($mensaje));
?>