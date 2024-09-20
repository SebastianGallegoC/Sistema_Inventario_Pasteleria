<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "elgarbanzo";

// Establecer la conexión con la base de datos
$conn = new mysqli($servidor, $usuario, $clave, $bd);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar la lista de ingredientes si no existe en la sesión
if (!isset($_SESSION['ingredientes'])) {
    $_SESSION['ingredientes'] = [];
}

// Consultar los ingredientes desde la base de datos
$sql = "SELECT * FROM ingredientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION['ingredientes'][$row['Nombre_ingrediente']] = $row['Cantidad_ingrediente'];
    }
} else {
    echo "0 resultados";
}

// Procesar la eliminación de un ingrediente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $ingrediente_a_eliminar = $_POST['ingrediente_a_eliminar'];
    if (array_key_exists($ingrediente_a_eliminar, $_SESSION['ingredientes'])) {
        // Eliminar el ingrediente de la sesión
        unset($_SESSION['ingredientes'][$ingrediente_a_eliminar]);
        // Eliminar el ingrediente de la base de datos
        $eliminar_sql = "DELETE FROM ingredientes WHERE Nombre_ingrediente = '$ingrediente_a_eliminar'";
        if ($conn->query($eliminar_sql) === TRUE) {
            echo "Ingrediente eliminado correctamente de la base de datos";
        } else {
            echo "Error al eliminar el ingrediente de la base de datos: " . $conn->error;
        }
    }
}

// Procesar la adición de un nuevo ingrediente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])) {
    $nuevo_ingrediente = $_POST['nuevo_ingrediente'];
    $cantidad = $_POST['cantidad'];
    // Agregar el nuevo ingrediente a la sesión
    $_SESSION['ingredientes'][$nuevo_ingrediente] = $cantidad;
    // Insertar el nuevo ingrediente en la base de datos
    $insertar_sql = "INSERT INTO ingredientes (Nombre_ingrediente, Cantidad_ingrediente) VALUES ('$nuevo_ingrediente', '$cantidad')";
    if ($conn->query($insertar_sql) === TRUE) {
        echo "Nuevo ingrediente agregado correctamente a la base de datos";
    } else {
        echo "Error al agregar el nuevo ingrediente a la base de datos: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes</title>
    <link rel="stylesheet" href="stylo.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Ingredientes</h1>
        <table>
            <thead>
                <tr>
                    <th>Ingrediente</th>
                    <th>Cantidad (kg)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los ingredientes desde la sesión
                foreach ($_SESSION['ingredientes'] as $ingrediente => $cantidad) {
                    echo "<tr>
                            <td>$ingrediente</td>
                            <td>$cantidad</td>
                            <td>
                                <form method='POST' style='display:inline;'>
                                    <input type='hidden' name='ingrediente_a_eliminar' value='$ingrediente'>
                                    <button type='submit' name='eliminar' class='btn'>Eliminar</button>
                                </form>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="actions">
            <form method="POST" class="add-form">
                <input type="text" name="nuevo_ingrediente" placeholder="Nuevo ingrediente" required>
                <input type="number" name="cantidad" placeholder="Cantidad (kg)" required min="0" step="0.01">
                <button type="submit" name="agregar" class="btn">Agregar Nuevo Ingrediente</button>
            </form>
        </div>
        <body>
            <button onclick="window.location.href='Modificaringrediente.php'">Modificar ingrediente</button>
        </body>
        <body>
            <button onclick="window.location.href='Menuadministrador.php'">volver</button>
        </body>
    </div>
</body>
</html>
