
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header("Location: index.html");
            exit();
        }

        echo "<h1>Inicio de sesión exitoso</h1>";
        echo "<p>Bienvenido, " . $_SESSION['usuario'] . "!</p>";
        echo "<p><a href='Ingredientes.php'>Ingredientes</a></p>";
        echo "<p><a href='Consultarventas.php'>Consultar ventas</a></p>";
        ?>
        <button onclick="window.location.href='Index.php'">Volver</button>
    </div>
</body>

</html>

<style type="text/css">
    /* General Styles */
body {
    font-family: 'Helvetica Neue', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    color: #333;
}

.container {
    background-color: #fff;
    padding: 20px 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    font-size: 2em;
    margin-bottom: 10px;
}

p {
    font-size: 1em;
    margin-bottom: 20px;
}

a {
    display: inline-block;
    margin: 10px 0;
    font-size: 1em;
    color: #fff;
    background-color: #007bff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
}

a:hover {
    background-color: #0056b3;
}

button {
    font-size: 1em;
    color: #fff;
    background-color: #007bff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

</style>