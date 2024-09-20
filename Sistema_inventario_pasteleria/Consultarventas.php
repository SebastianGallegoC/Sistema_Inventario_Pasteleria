<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "elgarbanzo";
$coneccion = mysqli_connect($servidor, $usuario, $clave, $bd);

// Verificar si la conexión a la base de datos fue exitosa
if (!$coneccion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Consultar todas las ventas
$query_ventas = "SELECT * FROM factura";
$result_ventas = mysqli_query($coneccion, $query_ventas);

// Verificar si hay ventas
if (mysqli_num_rows($result_ventas) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Código factura</th><th>Documento Cliente</th><th>Fecha</th><th>Pastel de Yuca</th><th>Papa Rellena</th><th>Pastel de Pollo</th><th>Pastel Mixto</th><th>Pastel Arroz con Carne</th><th>Pastel de Garbanzo</th><th>Subtotal Factura</th><th>Total Factura</th></tr>";
    while ($row = mysqli_fetch_assoc($result_ventas)) {
        echo "<tr>";
        echo "<td>" . $row["Cod_factura"] . "</td>";
        echo "<td>" . $row["Doc_cliente"] . "</td>";
        echo "<td>" . $row["Fecha_factura"] . "</td>";
        echo "<td>" . $row["Pastel_yuca"] . "</td>";
        echo "<td>" . $row["Papa_rellena"] . "</td>";
        echo "<td>" . $row["Pastel_pollo"] . "</td>";
        echo "<td>" . $row["Pastel_mixto"] . "</td>";
        echo "<td>" . $row["Pastel_arroz_carne"] . "</td>";
        echo "<td>" . $row["Pastel_garbanzo"] . "</td>";
        echo "<td>" . $row["Subtotal_factura"] . "</td>";
        echo "<td>" . $row["Total_factura"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron ventas.";
}

// Cerrar la conexión a la base de datos
mysqli_close($coneccion);
?>

<td colspan="2" align="center">
    <button onclick="window.location.href='Menuadministrador.php'">Volver</button>
</td>

