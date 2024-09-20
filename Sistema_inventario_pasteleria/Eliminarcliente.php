<?php
$servidor = "localhost"; 
$usuario = "root"; 
$clave = ""; 
$bd = "elgarbanzo";
$conn = new mysqli($servidor, $usuario, $clave, $bd );

if(isset($_POST['eliminar'])){
    $Documento_cliente = $_POST['Documento_cliente'];
    
    if(!empty($Documento_cliente)) {
        $eliminar = "DELETE FROM clientes WHERE Documento_cliente = $Documento_cliente;";
        $resultado = mysqli_query($conn, $eliminar);
        
        if($resultado) {
            echo "Se eliminó el dato correctamente.";
        } else {
            echo "Error al eliminar el dato: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor, ingresa un código de cliente para eliminar.";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Código del cliente para eliminarlo: <input type="number" name="Documento_cliente">
  <button type="submit" name="eliminar" value="eliminar">Eliminar</button>
</form>

<td colspan="2" align="center">
  <button onclick="window.location.href='Clientes.php'">Volver</button>
</td>