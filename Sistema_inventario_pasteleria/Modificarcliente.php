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
      $Documento_cliente = $_POST['Documento_cliente'];
      $Nombre_cliente1 = $_POST['Nombre_cliente'];
      $Correo_cliente1 = $_POST['Correo_cliente'];
      $Direccion_cliente1 = $_POST['Direccion_cliente']; 
      $Nit_cliente1 = $_POST['Nit_cliente'];
    }
  } else {
    echo "Código de cliente no encontrado";
  }
}

if(isset($_POST['enviar'])) {
    $Documento_cliente = $_POST['Documento_cliente'];
    $Nombre_cliente = $_POST['Nombre_cliente'];
    $Correo_cliente = $_POST['Correo_cliente'];
    $Direccion_cliente = $_POST['Direccion_cliente']; 
    $Nit_cliente = $_POST['Nit_cliente'];

    // Verificar si los campos están vacíos y si lo están, mantener los valores anteriores
    $Nombre_cliente = empty($Nombre_cliente) ? $Nombre_cliente1 : $Nombre_cliente;
    $Correo_cliente = empty($Correo_cliente) ? $Correo_cliente1 : $Correo_cliente;
    $Direccion_cliente = empty($Direccion_cliente) ? $Direccion_cliente1 : $Direccion_cliente;
    $Nit_cliente = empty($Nit_cliente) ? $Nit_cliente1 : $Nit_cliente;
    
    $insertar = "UPDATE clientes SET 
                Nombre_cliente = CASE WHEN '$Nombre_cliente' = '' THEN Nombre_cliente ELSE '$Nombre_cliente' END, 
                Correo_cliente = CASE WHEN '$Correo_cliente' = '' THEN Correo_cliente ELSE '$Correo_cliente' END, 
                Direccion_cliente = CASE WHEN '$Direccion_cliente' = '' THEN Direccion_cliente ELSE '$Direccion_cliente' END, 
                Nit_cliente = CASE WHEN '$Nit_cliente' = '' THEN Nit_cliente ELSE '$Nit_cliente' END
                WHERE Documento_cliente = '$Documento_cliente'";
    $resultado = mysqli_query($conn, $insertar);
    if($resultado) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Código del cliente: <input type="number" name="Documento_cliente">
        <br>
        <br>
        Nuevo Nombre del cliente: <input type="text" step="any" size="20" name="Nombre_cliente" value="">
        <br>
        Nuevo correo: <input type="email" step="any" size="20" name="Correo_cliente" value="">
        <br>
        Nueva dirección: <input type="text" step="any" size="20" name="Direccion_cliente" value="">
        <br>
        Nuevo Nit: <input type="number" step="any" size="20" name="Nit_cliente" value="">
        <br>
        <br>
        <input type="submit" value="Registrar" name="enviar">
    </form>

    <a href="Clientes.php">Volver</a>

</body>

</html>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

a {
    display: inline-block;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
