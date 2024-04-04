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

<!-- 
// $destino = "vejed18536@adstam.com";
// $nombre = $_POST["nombre"];
// $correo = $_POST["correo_electronico"];
// $telefono = $_POST["telefono"];
// $mensaje = $_POST["asunto"];
// $contenido = "Nombre: " . $nombre . "\n Correo:" . $correo . "\n Telefono:" . $telefono . "\n Mensaje:" . $mensaje;

// if (mail($destino, "Contacto", $contenido)) {
//     $mensaje = "¡Mensaje enviado! Nos pondremos en contacto contigo pronto.";
// } else {
//     $mensaje = "Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo.";
// }

// header("Location: conT.html?mensaje=" . urlencode($mensaje));
?> -->

<?php
// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = strip_tags(trim($_POST["nombre"]));
    $apellido = strip_tags(trim($_POST["apellido"]));
    $email = filter_var(trim($_POST["correo_electronico"]), FILTER_SANITIZE_EMAIL);
    $telefono = strip_tags(trim($_POST["telefono"]));
    $asunto = trim($_POST["asunto"]);
    $mensaje_form = trim($_POST["mensaje"]);

    // Especifica a dÃ³nde quieres enviar el correo
    $destinatario = "231242031@alumnos.utn.edu.mx";
    // Crea el asunto del correo
    $asuntoCorreo = "Nuevo mensaje de $nombre $apellido: $asunto";

    // Construye el cuerpo del mensaje
    $mensaje = "Nombre: $nombre\n";
    $mensaje .= "Apellido: $apellido\n";
    $mensaje .= "Email: $email\n";
    $mensaje .= "Telefono: $telefono\n\n";
    $mensaje .= "Mensaje:\n$mensaje_form\n";

    // Encabezados para el correo
    $encabezados = "From: $nombre <$email>";

    // EnvÃ­a el correo
    if (mail($destinatario, $asuntoCorreo, $mensaje, $encabezados)) {
        // Redirige a una pÃ¡gina de gracias o muestra un mensaje
        echo "<p>Â¡Gracias por tu mensaje, $nombre! Nos pondremos en contacto contigo pronto.</p>";
    } else {
        echo "<p>Lo sentimos, hubo un error al enviar tu mensaje. Intenta nuevamente mÃ¡s tarde.</p>";
    }
} else {
    // No se accediÃ³ al archivo a travÃ©s del mÃ©todo POST
    echo "<p>Algo saliÃ³ mal.</p>";
}
?>