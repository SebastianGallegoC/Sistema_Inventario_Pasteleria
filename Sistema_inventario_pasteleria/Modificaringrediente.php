<?php
$servidor = "localhost"; 
$usuario = "root"; 
$clave = ""; 
$bd = "elgarbanzo";
$conn = new mysqli($servidor, $usuario, $clave, $bd );

$Nombre_ingrediente1 = "";
$Cantidad_ingrediente1 = "";
$Tipo_cantidad1 = "";
$Precio_ingrediente1 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $Cod_ingrediente = $_POST["Cod_ingrediente"];

  $sql = "SELECT * FROM ingredientes WHERE Cod_ingrediente = '$Cod_ingrediente'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {   
    while($row = $result->fetch_assoc()) {
      $Cod_ingrediente = $_POST['Cod_ingrediente'];
      $Nombre_ingrediente1 = $_POST['Nombre_ingrediente'];
      $Cantidad_ingrediente1 = $_POST['Cantidad_ingrediente'];
      $Tipo_cantidad1 = $_POST['Tipo_cantidad'];
      $Precio_ingrediente1 = $_POST['Precio_ingrediente']; 
    }
  } else {
    echo "Código de ingrediente no encontrado";
  }
}

if(isset($_POST['enviar'])) {
    $Cod_ingrediente = $_POST['Cod_ingrediente'];
    $Nombre_ingrediente = $_POST['Nombre_ingrediente'];
    $Cantidad_ingrediente = $_POST['Cantidad_ingrediente'];
    $Tipo_cantidad = $_POST['Tipo_cantidad'];
    $Precio_ingrediente = $_POST['Precio_ingrediente']; 

    // Verificar si los campos están vacíos y si lo están, mantener los valores anteriores
    $Nombre_ingrediente = empty($Nombre_ingrediente) ? $Nombre_ingrediente1 : $Nombre_ingrediente;
    $Cantidad_ingrediente = empty($Cantidad_ingrediente) ? $Cantidad_ingrediente1 : $Cantidad_ingrediente;
    $Tipo_cantidad = empty($Tipo_cantidad) ? $Tipo_cantidad1 : $Tipo_cantidad;
    $Precio_ingrediente = empty($Precio_ingrediente) ? $Precio_ingrediente1 : $Precio_ingrediente;
    
    $insertar = "UPDATE ingredientes SET 
                Nombre_ingrediente = CASE WHEN '$Nombre_ingrediente' = '' THEN Nombre_ingrediente ELSE '$Nombre_ingrediente' END, 
                Cantidad_ingrediente = CASE WHEN '$Cantidad_ingrediente' = '' THEN Cantidad_ingrediente ELSE '$Cantidad_ingrediente' END, 
                Tipo_cantidad = CASE WHEN '$Tipo_cantidad' = '' THEN Tipo_cantidad ELSE '$Tipo_cantidad' END,
                Precio_ingrediente = CASE WHEN '$Precio_ingrediente' = '' THEN Precio_ingrediente ELSE '$Precio_ingrediente' END
                WHERE Cod_ingrediente = '$Cod_ingrediente'";
    $resultado = mysqli_query($conn, $insertar);
    if($resultado) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
}
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Código del ingrediente: <input type="number" name="Cod_ingrediente">
  <br>
  <br>
  <table border=0 cellspacing=2  width=350 style="background-color: rgba(255, 255, 255, 0.8)">
    <tr><td align="right"><b><FONT SIZE=4>Nuevo Nombre del ingrediente</FONT></b></td>
      <td><input type="text" size="20" name="Nombre_ingrediente" value=""></td></tr>
    <tr><td align="right"><b><FONT SIZE=4>Nuevo cantidad</FONT></b></td>
      <td><input type="number" step="any" size="20" name="Cantidad_ingrediente" value=""></td></tr>
    <tr><td align="right"><b><FONT SIZE=4>Nuevo tipo de cantidad</FONT></b></td>
      <td><input type="text" size="20" name="Tipo_cantidad" value=""></td></tr>
    <tr><td align="right"><b><FONT SIZE=4>Nuevo precio</FONT></b></td>
      <td><input type="number" step="any" size="20" name="Precio_ingrediente" value=""></td></tr>

    <tr><td></td>
      <td align="right"><input type="submit" align="center" value="Registrar" name="enviar"></td></tr>
  </table>
</form>
<br>
<a href="Ingredientes.php"><button>Volver</button></a>


<style>
  /* Estilos para el formulario */
  form {
    margin: 20px auto;
    width: 300px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
  }
  input[type="number"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
  }
  input[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  /* Estilos para la salida de resultados */
  .resultado {
    margin: 20px auto;
    width: 300px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f0f0f0;
  }
</style>