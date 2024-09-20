<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php
        echo "<h1>Inicio de sesión exitoso. Bienvenido, " . $_SESSION['usuario'] . "!</h1>";
        echo "<p><a href='Domicilios.php'>Domicilios</a></p>";
        ?>

        <div class="table-container">
            <table>
                <tr>
                    <td colspan="2" align="center">
                        <button onclick="window.location.href='Index.php'">Volver</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
