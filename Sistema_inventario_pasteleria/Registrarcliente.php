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

if(isset($_POST['enviar'])) {
  // Recoger los datos del formulario
  $documento = $_POST['Documento_cliente'];
  $nombre = $_POST['Nombre_cliente'];
  $correo = $_POST['Correo_Cliente'];
  $direccion = $_POST['Direccion_cliente'];
  $nit = $_POST['Nit_cliente'];

  // Aquí podrías realizar validaciones adicionales si es necesario

  // Insertar los datos en la base de datos
  $sql = "INSERT INTO clientes (Documento_cliente, Nombre_cliente, Correo_Cliente, Direccion_cliente, Nit_cliente) VALUES ('$documento', '$nombre', '$correo', '$direccion', '$nit')";

  if ($conn->query($sql) === TRUE) {
      echo "Registro exitoso";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>PASTELES</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('super.png');
      background-repeat: no-repeat;
      background-size: cover;
      color: #000000;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background-color: rgba(255, 255, 255, 0.9);
      width: 350px;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
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
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<form name="cliente" action="" method="post">
  <center>
    <br>
    <br>
    <table border=0 cellspacing=2 width=350 style="background-color: rgba(255, 255, 255, 0.8)">
      <tr><td align="right"><b> <FONT SIZE=4>Documento del cliente</FONT></b></td>
      <td><input type="number" step="any" size="20" name="Documento_cliente" value=""></td></tr>
      <tr><td align="right"><b> <FONT SIZE=4>Nombre</FONT></b></td>
      <td><input type="text" step="any" size="20" name="Nombre_cliente" value=""></td></tr>
      <tr><td align="right"><b> <FONT SIZE=4>Correo</FONT></b></td>
      <td><input type="varchar" step="any" size="20" name="Correo_Cliente" value=""></td></tr>
      <tr><td align="right"><b> <FONT SIZE=4>Dirección</FONT></b></td>
      <td><input type="varchar" step="any" size="20" name="Direccion_cliente" value=""></td></tr>
      <tr><td align="right"><b> <FONT SIZE=4>Número de NIT</FONT></b></td>
      <td><input type="number" step="any" size="20" name="Nit_cliente" value=""></td></tr>
      <tr><td></td>
      <td align="right"><input type="submit" align="center" value="Registrar " name="enviar"></td></tr>
    </table>
  </center>
  <br>
  <br>
  <br>
</form>

<button onclick="window.location.href='Clientes.php'">Volver</button>

</body>
</html>
