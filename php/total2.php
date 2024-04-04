<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Compra de Vehículo</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #fff;
            padding: 20px;
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .detalle-compra {
            background-color: #e9ecef;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .detalle-compra h2 {
            color: #007bff;
        }
        .detalle-compra p {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="header">
        <!-- <img src="CSS/logo.png" alt="Logo Izquierda"> -->
        <!-- <h1 class="game-of-squids-font">Urban Thrive Novelties</h1> -->
        
        <img src="../CSS/UTN.jpg" >
    </div>
    <div class="nav-bar">
    <a href="/ageCar/index.html">Inicio</a>
        <a href="#">Sobre Nosotros</a>
        <a href="#">Servicios</a>
        <a href="#">Contacto</a>
    </div>
    <div class="container">
        <h1>Resumen de Compra de Vehículo</h1>
        <div class="detalle-compra">   
            <?php
// Suponiendo que el precio del auto es de $250,000
$precioAuto = 334900;

// Capturando los datos enviados desde el formulario
$tipoPagoOpcion = $_POST['tipoPagoOpcion'] ?? '';
$plazo = $_POST['plazo'] ?? '';
$enganche = $_POST['enganche'] ?? 0;
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$telefono = $_POST['telefono'] ?? ''; // Asegúrate de tener este campo en tu formulario
$direccion = $_POST['direccion'] ?? ''; // Asegúrate de tener este campo en tu formulario
$email = $_POST['email'] ?? ''; // Asegúrate de tener este campo en tu formulario
$fechaRegistro = date('Y-m-d H:i:s'); // Fecha y hora actual

// Calculando el total a pagar según el tipo de pago
$totalPagar = $precioAuto - $enganche; // Restar el enganche del precio total si existe
$interes = 0;

function imprimirDatosComunes($nombre, $apellidos, $telefono, $direccion, $email, $fechaRegistro) {
    echo "Fecha de Registro/Compra: $fechaRegistro <br>";
    echo "Nombre del Beneficiario: $nombre $apellidos <br>";
    echo "Número de Teléfono: $telefono <br>";
    echo "Dirección: $direccion <br>";
    echo "Correo Electrónico: $email <br>";
}

switch ($tipoPagoOpcion) {
    case 'contado':
        echo "Compra exitosa. <br>";
        imprimirDatosComunes($nombre, $apellidos, $telefono, $direccion, $email, $fechaRegistro);
        echo "Forma de Pago: Contado <br>";
        echo "En un plazo de 48h se realizará la entrega del vehículo en su domicilio. <br>";
        break;

    case 'meses':
        // Pago a meses con interés
        if ($plazo == '12') {
            $interes = 0.10; // 10% de interés
        } elseif ($plazo == '24') {
            $interes = 0.20; // 20% de interés
        } elseif ($plazo == '36') {
            $interes = 0.30; // 30% de interés
        } elseif ($plazo == '48') {
            $interes = 0.40; // 40% de interés
        }

        // $totalPagar += $Cinteres - $enganche; // Calculando el total con interés        
        $Cinteres = $precioAuto+($precioAuto * $interes);
        $totalPagar = $Cinteres - $enganche;

        imprimirDatosComunes($nombre, $apellidos, $telefono, $direccion, $email, $fechaRegistro);
        echo "Forma de Pago: A Meses <br>";
        echo "Plazo: $plazo meses <br>";
        echo "Precio del auto: $$precioAuto <br>";
        echo "Con interes: $$Cinteres <br>";
        echo "Enganche: $$enganche <br>";
        // echo "Total a pagar con interés: $".number_format($totalPagar, 2)."<br>";
        echo "Total a pagar : $$totalPagar <br>";

        break;

        // ... Mostrar otros datos capturados
        break;

    // ... puedes manejar otros casos si es necesario

    default:
        echo "Forma de pago no especificada.";
        break;
}

?>
</div>
</div>
</body>
</html>
