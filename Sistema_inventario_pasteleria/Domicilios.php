<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "elgarbanzo";
$coneccion = mysqli_connect($servidor, $usuario, $clave, $bd);


if (!$coneccion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consultar la venta más reciente
$query_venta_reciente = "SELECT * FROM factura ORDER BY Cod_factura DESC LIMIT 1";
$resultado_venta_reciente = mysqli_query($coneccion, $query_venta_reciente);

if (mysqli_num_rows($resultado_venta_reciente) > 0) {
    $fila_venta = mysqli_fetch_assoc($resultado_venta_reciente);

    if (isset($_POST["Documento_cliente"])) {
        $documento_cliente = $_POST["Documento_cliente"];
        // Resto del código que utiliza $documento_cliente
    } else {
        echo "Documento del cliente no proporcionado.";
    }
    
    $documento_cliente = $fila_venta['Documento_cliente'];
    $query_direccion_cliente = "SELECT Direccion_cliente FROM clientes WHERE Documento_cliente = '$documento_cliente'";
    $resultado_direccion_cliente = mysqli_query($coneccion, $query_direccion_cliente);
    $fila_direccion_cliente = mysqli_fetch_assoc($resultado_direccion_cliente);
    $direccion_cliente = $fila_direccion_cliente['Direccion_cliente'];

    
    $query_costos = "SELECT nombre_pastel, precio_venta FROM pasteles";
    $result_costos = mysqli_query($coneccion, $query_costos);

    $costos = [];
    while ($row = mysqli_fetch_assoc($result_costos)) {
        $costos[$row['nombre_pastel']] = $row['precio_venta'];
    }
    

    echo "<h2>Recibo de Venta</h2>";
    echo "<p><b>Dirección del Cliente:</b> $direccion_cliente</p>";
    echo "<table class='recibo'>";
    echo "<tr><th>Descripción</th><th>Cantidad</th><th>Precio Unitario</th><th>Subtotal</th></tr>";
    echo "<tr><td>Pastel de Yuca</td><td>" . $fila_venta['Pastel_yuca'] . "</td><td>$" . $costos['Pastel_yuca'] . "</td><td>$" . ($fila_venta['Pastel_yuca'] * $costos['Pastel_yuca']) . "</td></tr>";
    echo "<tr><td>Papa rellena</td><td>" . $fila_venta['Papa_rellena'] . "</td><td>$" . $costos['Papa_rellena'] . "</td><td>$" . ($fila_venta['Papa_rellena'] * $costos['Papa_rellena']) . "</td></tr>";
    echo "<tr><td>Pastel de pollo</td><td>" . $fila_venta['Pastel_pollo'] . "</td><td>$" . $costos['Pastel_pollo'] . "</td><td>$" . ($fila_venta['Pastel_pollo'] * $costos['Pastel_pollo']) . "</td></tr>";
    echo "<tr><td>Pastel mixto</td><td>" . $fila_venta['Pastel_mixto'] . "</td><td>$" . $costos['Pastel_mixto'] . "</td><td>$" . ($fila_venta['Pastel_mixto'] * $costos['Pastel_mixto']) . "</td></tr>";
    echo "<tr><td>Pastel de arroz con carne</td><td>" . $fila_venta['Pastel_arroz_carne'] . "</td><td>$" . $costos['Pastel_arroz_carne'] . "</td><td>$" . ($fila_venta['Pastel_arroz_carne'] * $costos['Pastel_arroz_carne']) . "</td></tr>";
    echo "<tr><td>Pastel de garbanzo</td><td>" . $fila_venta['Pastel_garbanzo'] . "</td><td>$" . $costos['Pastel_garbanzo'] . "</td><td>$" . ($fila_venta['Pastel_garbanzo'] * $costos['Pastel_garbanzo']) . "</td></tr>";

  
    $subtotal = $fila_venta['Subtotal_factura'];
    $total = $fila_venta['Total_factura'];
    
    echo "<tr class='total'><td colspan='3'>Subtotal</td><td>$" . number_format($subtotal, 2) . "</td></tr>";
    echo "<tr class='total'><td colspan='3'><b>Total</b></td><td><b>$" . number_format($total, 2) . "</b></td></tr>";
    echo "</table>";
} else {
    echo "No hay ventas registradas.";
}

mysqli_close($coneccion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Venta</title>
 
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .recibo {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .recibo th, .recibo td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .recibo th {
            background-color: #f2f2f2;
        }

        .recibo tr.total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <button onclick="window.location.href='Menudomiciliario.php'">Volver</button>
</body>
</html>
