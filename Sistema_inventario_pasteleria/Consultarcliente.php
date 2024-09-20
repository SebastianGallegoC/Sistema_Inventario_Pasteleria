<?php
$servidor = "localhost"; 
$usuario = "root"; 
$clave = ""; 
$bd = "elgarbanzo";
$conn = new mysqli($servidor, $usuario, $clave, $bd );


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

  $Documento_cliente = $_POST["Documento_cliente"];

  
  $sql = "SELECT * FROM clientes WHERE Documento_cliente = '$Documento_cliente'";

  
  $result = $conn->query($sql);

  
  if ($result->num_rows > 0) {   
    while($row = $result->fetch_assoc()) {
      echo "Nombre: " . $row["Nombre_cliente"]. "<br>";
      echo "Correo: " . $row["Correo_cliente"]. "<br>";
      echo "Direccion: " . $row["Direccion_cliente"]. "<br>";
      echo "Codigo NIT: " . $row["Nit_cliente"]. "<br>";
    }
  } else {
    echo "Codigo de pastel no encontrado";
  }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Documento cliente: <input type="number" name="Documento_cliente">
  <input type="submit" value="Buscar">
</form>

<td colspan="2" align="center">
  <button onclick="window.location.href='Clientes.php'">Volver</button>
</td>

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