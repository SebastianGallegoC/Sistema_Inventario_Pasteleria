<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

echo "Inicio de sesión exitoso. Bienvenido, " . $_SESSION['usuario'] . "!";
echo "<p><a href='Clientes.php'>Clientes</a></p>";
echo "<p><a href='Ventas.php'>Ventas</a></p>";

?>

<tr>
    <td colspan="2" align="center">
        <button onclick="window.location.href='Index.php'">Volver</button>
    </td>
</tr>