<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "elgarbanzo";
$coneccion = mysqli_connect($servidor, $usuario, $clave, $bd);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Doc_cliente = $_POST['Doc_cliente'];
    $Pastel_yuca = $_POST['Pastel_yuca'];
    $Papa_rellena = $_POST['Papa_rellena'];
    $Pastel_pollo = $_POST['Pastel_pollo'];
    $Pastel_mixto = $_POST['Pastel_mixto'];
    $Pastel_arroz_carne = $_POST['Pastel_arroz_carne'];
    $Pastel_garbanzo = $_POST['Pastel_garbanzo'];
    
    

    // Obtener los costos unitarios de cada pastel desde la base de datos
    $query_costos = "SELECT nombre_pastel, precio_venta FROM pasteles";
    $result_costos = mysqli_query($coneccion, $query_costos);

    $costos = [];
    while ($row = mysqli_fetch_assoc($result_costos)) {
        $costos[$row['nombre_pastel']] = $row['precio_venta'];
    }

    // Calcular el costo total de la factura
    $Subtotal_factura = 0;
    $Subtotal_factura += $Pastel_yuca * $costos['Pastel_yuca'];
    $Subtotal_factura += $Papa_rellena * $costos['Papa_rellena'];
    $Subtotal_factura += $Pastel_pollo * $costos['Pastel_pollo'];
    $Subtotal_factura += $Pastel_mixto * $costos['Pastel_mixto'];
    $Subtotal_factura += $Pastel_arroz_carne * $costos['Pastel_arroz_carne'];
    $Subtotal_factura += $Pastel_garbanzo * $costos['Pastel_garbanzo'];
    
    // Consultar los datos de los ingredientes desde la base de datos
$query_ingredientes = "SELECT Nombre_ingrediente, Cantidad_ingrediente FROM ingredientes";
$result_ingredientes = mysqli_query($coneccion, $query_ingredientes);

// Inicializar un array asociativo para almacenar las cantidades de cada ingrediente
$ingredientes_cantidad = array();

// Iterar sobre los resultados de la consulta y almacenar las cantidades en el array
while ($row = mysqli_fetch_assoc($result_ingredientes)) {
    $ingredientes_cantidad[$row['Nombre_ingrediente']] = $row['Cantidad_ingrediente'];
}

    $IVA = $Subtotal_factura * 0.19;
    $Total_factura = $Subtotal_factura + $IVA;

    $Yuca_u = 0;
    $Arroz_u = 0;
    $Carnemolida_u = 0;
    $Huevo_u  = 0;
    $Guiso_u  = 0;
    $Harina_u  = 0;
    $Aceite_u  = 0;
    $Sal_u  = 0;
    $Pechuga_u = 0;
    $Garbanzo_u = 0;
    $Papa_u = 0;


if('Pastel_yuca > 0'){
    $Yuca_u += 0.1 * $Pastel_yuca;
    $Arroz_u += 0.002 * $Pastel_yuca;
    $Carnemolida_u += 0.015 * $Pastel_yuca;
    $Huevo_u += 1 * $Pastel_yuca;
    $Guiso_u += 0.003 * $Pastel_yuca;
    $Harina_u += 0.01 * $Pastel_yuca;
    $Aceite_u += 0.03 * $Pastel_yuca;
    $Sal_u += 0.002 * $Pastel_yuca;
}

if('Pastel_pollo > 0'){
    $Pechuga_u += 0.04 * $Pastel_pollo;
    $Guiso_u += 0.003 * $Pastel_pollo;
    $Harina_u += 0.04 * $Pastel_pollo;
    $Aceite_u += 0.03 * $Pastel_pollo;
    $Sal_u += 0.002 * $Pastel_pollo;
}

if('Pastel_mixto > 0'){
    $Carnemolida_u += 0.015 * $Pastel_mixto;
    $Pechuga_u += 0.01 * $Pastel_mixto;
    $Huevo_u += 1   * $Pastel_mixto;
    $Guiso_u += 0.003 * $Pastel_mixto;
    $Harina_u += 0.04 * $Pastel_mixto;
    $Aceite_u += 0.03 * $Pastel_mixto;
    $Sal_u += 0.002 * $Pastel_mixto;
}

if('Pastel_arroz_carne > 0'){
    $Huevo_u += 0.1 * $Pastel_arroz_carne;
    $Arroz_u += 0.02 * $Pastel_arroz_carne;
    $Carnemolida_u += 0.015 * $Pastel_arroz_carne;
    $Guiso_u += 0.003 * $Pastel_arroz_carne;
    $Harina_u += 0.04 * $Pastel_arroz_carne;
    $Aceite_u += 0.03 * $Pastel_arroz_carne;
}

if('Pastel_garbanzo > 0'){
    $Sal_u += 0.002 * $Pastel_garbanzo;
    $Garbanzo_u += 0.015 * $Pastel_garbanzo;
    $Huevo_u += 1 * $Pastel_garbanzo;
    $Guiso_u += 0.003 * $Pastel_garbanzo;
    $Harina_u += 0.01 * $Pastel_garbanzo;
    $Aceite_u += 0.03 * $Pastel_garbanzo;
}

if('Papa_rellena > 0'){
    $Sal_u += 0.002 * $Papa_rellena;
    $Papa_u += 0.01 * $Papa_rellena;
    $Carnemolida_u += 0.015 * $Papa_rellena;
    $Pechuga_u += 0.0175 * $Papa_rellena;
    $Huevo_u += 1 * $Papa_rellena;
    $Guiso_u += 0.003 * $Papa_rellena;
    $Harina_u += 0.01 * $Papa_rellena;
    $Aceite_u += 0.03 * $Papa_rellena;
}

// Actualizar las Cantidad de ingredientes en la base de datos
$query_update_yuca = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Yuca_u WHERE Nombre_ingrediente = 'Yuca'";
$query_update_arroz = "UPDATE ingredientes SET Cantidad_ingrediente= Cantidad_ingrediente - $Arroz_u WHERE Nombre_ingrediente = 'Arroz'";
$query_update_carnemolida = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Carnemolida_u WHERE Nombre_ingrediente = 'Carne molida'";
$query_update_huevo = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Huevo_u WHERE Nombre_ingrediente = 'Huevos'";
$query_update_guiso = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Guiso_u WHERE Nombre_ingrediente = 'Guiso'";
$query_update_harina = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Harina_u WHERE Nombre_ingrediente = 'Harina de trigo'";
$query_update_aceite = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Aceite_u WHERE Nombre_ingrediente = 'Aceite'";
$query_update_sal = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Sal_u WHERE Nombre_ingrediente = 'Sal'";
$query_update_pechuga = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Pechuga_u WHERE Nombre_ingrediente = 'Pechuga'";
$query_update_garbanzo = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Garbanzo_u WHERE Nombre_ingrediente = 'Garbanzo'";
$query_update_papa = "UPDATE ingredientes SET Cantidad_ingrediente = Cantidad_ingrediente - $Papa_u WHERE Nombre_ingrediente = 'Papa'";

// Ejecutar las consultas de actualización
mysqli_query($coneccion, $query_update_yuca);
mysqli_query($coneccion, $query_update_arroz);
mysqli_query($coneccion, $query_update_carnemolida);
mysqli_query($coneccion, $query_update_huevo);
mysqli_query($coneccion, $query_update_guiso);
mysqli_query($coneccion, $query_update_harina);
mysqli_query($coneccion, $query_update_aceite);
mysqli_query($coneccion, $query_update_sal);
mysqli_query($coneccion, $query_update_pechuga);
mysqli_query($coneccion, $query_update_garbanzo);
mysqli_query($coneccion, $query_update_papa);

    // Insertar el pedido en la base de datos
    $query = "INSERT INTO factura (Doc_cliente, Pastel_yuca, Pastel_pollo, Pastel_garbanzo, Pastel_mixto, Papa_rellena, Pastel_arroz_carne, Subtotal_factura, Total_factura) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($coneccion, $query);
    mysqli_stmt_bind_param($stmt, "idddddddd", $Doc_cliente, $Pastel_yuca, $Pastel_pollo, $Pastel_garbanzo, $Pastel_mixto, $Papa_rellena, $Pastel_arroz_carne, $Subtotal_factura, $Total_factura);

    if (mysqli_stmt_execute($stmt)) {
        echo "Pedido registrado exitosamente. El costo total sin IVA es $" . number_format($Subtotal_factura, 2);
        echo " El costo total con IVA es $" . number_format($Total_factura, 2);
    } else {
        echo "Error: " . mysqli_error($coneccion);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Pedido</title>
</head>
<body background="super.png" text="000000">
    <center>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table border="0" cellspacing="2" width="350" style="background-color: rgba(255, 255, 255, 0.8)">
                <tr>
                    <td align="right"><b><font size="4">Documento cliente</font></b></td>
                    <td><input type="number" name="Doc_cliente" required></td>
                </tr>
                <tr>
                    <td align="right"><b><font size="4">Pastel de yuca</font></b></td>
                    <td><input type="number" step="any" name="Pastel_yuca" required></td>
                </tr>
                <tr>
                    <td align="right"><b><font size="4">Papa rellena</font></b></td>
                    <td><input type="number" step="any" name="Papa_rellena" required></td>
                </tr>
                <tr>
                    <td align="right"><b><font size="4">Pastel de pollo</font></b></td>
                    <td><input type="number" step="any" name="Pastel_pollo" required></td>
                </tr>
                <tr>
                    <td align="right"><b><font size="4">Pastel mixto</font></b></td>
                    <td><input type="number" step="any" name="Pastel_mixto" required></td>
                </tr>
                <tr>
                    <td align="right"><b><font size="4">Pastel arroz con carne</font></b></td>
                    <td><input type="number" step="any" name="Pastel_arroz_carne" required></td>
                </tr>
                <tr>
                    <td align="right"><b><font size="4">Pastel de garbanzo</font></b></td>
                    <td><input type="number" step="any" name="Pastel_garbanzo" required></td>
                </tr>
                
                
                <tr>
                    <td></td>
                    <td align="right"><input type="submit" value="Registrar" name="enviar"></td>
                </tr>
            </table>
        </form>
        <br>
        <td colspan="2" align="center">
            <button onclick="window.location.href='Recibo.php'">Recibo</button>
        </td>
        <td colspan="2" align="center">
            <button onclick="window.location.href='Menuvendedor.php'">Volver</button>
        </td>
    </center>
</body>
</html>


