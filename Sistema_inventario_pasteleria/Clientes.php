<?php
    session_start(); // Iniciar la sesión para acceder a $_SESSION

    echo "<p>MENU.</p>";
    echo "<p><a href='Registrarcliente.php'>Registrar cliente</a></p>";
    echo "<p><a href='Consultarcliente.php'>Consultar Cliente</a></p>";
    echo "<p><a href='Modificarcliente.php'>Modificar Cliente</a></p>";
    echo "<p><a href='Eliminarcliente.php'>Eliminar Cliente</a></p>";
    
// Verificar si $_SESSION['usuario'] está definido antes de usarlo
if (isset($_SESSION['usuario'])) {
    $cuser = $_SESSION['usuario'];
    if ($cuser == "user1") {
        $a = "Menuadministrador.php";
    } elseif ($cuser == "user2") {
        $a = "Menudomiciliario.php";
    } elseif ($cuser == "user3") {
        $a = "Menuvendedor.php";
    }
}
?>

<tr>
    <td colspan="2" align="center">
        <button onclick="window.location.href='<?php echo $a; ?>'">Volver</button>
    </td>
</tr>