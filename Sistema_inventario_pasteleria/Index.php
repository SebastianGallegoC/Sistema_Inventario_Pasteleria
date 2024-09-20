<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "elgarbanzo";

$coneccion = mysqli_connect($servidor, $usuario, $clave, $bd);

if (!$coneccion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['enviar'])) {
    $cuser = mysqli_real_escape_string($coneccion, $_POST['cuser']);
    $ccontraseña = mysqli_real_escape_string($coneccion, $_POST['ccontraseña']);
    $crol = mysqli_real_escape_string($coneccion, $_POST['crol']);

    // Verificar si el usuario y la contraseña existen en la base de datos
    $sql = "SELECT user, contraseña FROM iniciarsesion WHERE rol = ?";
    $stmt = mysqli_prepare($coneccion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $crol);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $db_user = $row['user'];
            $db_contraseña = $row['contraseña'];

            if ($cuser == $db_user && $ccontraseña == $db_contraseña) {
                $_SESSION['usuario'] = $cuser;
                
                // Redirigir según el rol
                if ($crol == "ADMINISTRADOR") {
                    header("Location: Menuadministrador.php");
                    exit();
                } elseif ($crol == "DOMICILIARIO") {
                    header("Location: Menudomiciliario.php");
                    exit();
                } elseif ($crol == "VENDEDOR") {
                    header("Location: Menuvendedor.php");
                    exit();
                }
            }
        }
        echo "<script>alert('El usuario y/o la contraseña no son válidos para el rol seleccionado.');</script>";
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($coneccion);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Erick Perez, Marlen Ortega, Walter Velasco, Sebastian Gallego">
    <title>Pastelería El Garbanzo</title>
    <link rel="icon" href="Images/Logo.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
        }

        .container-hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .Pasteleria-logo {
            display: flex;
            align-items: center;
        }

        .Pasteleria-logo img {
            margin-right: 15px;
        }

        .Pasteleria-logo .text {
            font-size: 1.2em;
            color: white;
        }

        .container-nav-icon {
            display: flex;
            align-items: center;
        }

        .container-nav-icon i {
            font-size: 1.5em;
            color: white;
            margin-right: 10px;
        }

        .container-ubication .text {
            font-size: 1em;
            color: white;
        }

        .container-navbar {
            background-color: #333;
            padding: 20px 0;
        }

        .navbar {
            display: flex;
            justify-content: space-around;
            padding: 10px;
        }

        .navegador {
            list-style: none;
            display: flex;
            justify-content: space-around;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .navegador li {
            flex: 1;
            text-align: center;
        }

        .title-navigator {
            font-size: 1.2em;
            color: white;
            margin-bottom: 10px;
        }

        .navegador ul {
            list-style: none;
            padding: 0;
        }

        .navegador ul li {
            margin-bottom: 5px;
            color: white;
        }

        .navegador a {
            text-decoration: none;
            color: #4CAF50;
        }

        .social-icons span {
            margin: 0 5px;
        }

        .social-icons i {
            color: white;
            font-size: 1.2em;
        }

        .form-login input {
            display: block;
            width: 80%;
            margin: 5px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-login {
            display: block;
            width: 50%;
            margin: 10px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-login i {
            margin-right: 5px;
        }

        .banner {
            background: url('garbanzoos.jpg') no-repeat center center/cover;
            color: white;
            padding: 50px 20px;
            text-align: center;
        }

        .banner p {
            font-size: 1.5em;
        }

        .banner h2 {
            font-size: 2.5em;
            margin: 10px 0;
        }

        .banner a {
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            border: 2px solid white;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .main-content {
            padding: 20px;
            background-color: white;
        }

        .footer {
            background-color: white;
            color: #4CAF50;
            text-align: center;
            padding: 20px;
            border-top: 3px solid #4CAF50;
        }

        .footer img {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-hero">
            <div class="Pasteleria-logo">
                <img src="garbanzoos.jpg" alt="logo1" height="60px">
                <div class="content-Pasteleria-logo">
                    <span class="text">Pastelería El Garbanzo</span>
                    <span class="text">"Pasión, Sabor Y Tradición"</span>
                </div>
            </div>

            <div class="container-nav-icon">
                <a href="login.html">
                    <i class="fas fa-user"></i>
                </a>
                <i class="fas fa-map-pin"></i>
                <div class="container-ubication">
                    <span class="text">Conoce nuestro</span>
                    <br>
                    <span class="text">punto de fabrica</span>
                </div>
            </div>
        </div>
    </header>

    <div class="container-navbar">
        <nav class="navbar container">
            <ul class="navegador">
                <li class="contact-info">
                    <p class="title-navigator">Información de Contacto</p>
                    <ul>
                        <li>Avenida 6a #21-68 Barrio La Cabrera</li>
                        <li>Teléfono: 3223195510</li>
                        <li>Email: Pasteleriagarbanzo@gmail.com</li>
                    </ul>
                    <div class="social-icons">
                        <span class="facebook"><i class="fab fa-facebook-f"></i></span>
                        <span class="youtube"><i class="fab fa-youtube"></i></span>
                        <span class="tiktok"><i class="fab fa-tiktok"></i></span>
                        <span class="instagram"><i class="fab fa-instagram"></i></span>
                    </div>
                </li>

                <li class="information">
                    <p class="title-navigator">Información</p>
                    <ul>
                        <li><a href="#">Acerca de Nosotros</a></li>
                        <li><a href="#">Información Delivery</a></li>
                        <li><a href="#">Políticas de Privacidad</a></li>
                        <li><a href="#">Términos y Condiciones</a></li>
                    </ul>
                </li>

                <li class="my-account">
                    <p class="title-navigator">Mi cuenta</p>
                    <ul>
                        <li><a href="#">Mi cuenta</a></li>
                        <li><a href="#">Productos que ofrecemos</a></li>
                        <li><a href="#">Boletín</a></li>
                        <li><a href="#">Recuperar contraseña</a></li>
                    </ul>
                </li>

                <li class="login-form">
                    <form method="post">
                        <table border=0 cellspacing=2 width=350 style="background-color: rgba(255, 255, 255, 0.8)">
                            <tr>
                                <td align="right"><b> <FONT SIZE=4>usuario</FONT></b></td>
                                <td><input type="text" step="any" size="20" name="cuser" value=""></td>
                            </tr>
                            <tr>
                                <td align="right"><b> <FONT SIZE=4>contraseña</FONT></b></td>
                                <td><input type="text" step="any" size="20" name="ccontraseña" value=""></td>
                            </tr>
                            <tr>
                                <td align="right"><b> <FONT SIZE=4>rol</FONT></b></td>
                                <td><input type="text" step="any" size="20" name="crol" value=""></td>
                            </tr>
                            <tr>
                                <td align="right"><input type="submit" align="center" value="Iniciar sesion" name="enviar"></td>
                            </tr>
                        </table>
                    </form>
                    </li>
            </ul>
        </nav>
    </div>

    <section class="banner">
        <div class="content-banner">
            <p>Pastelería El Garbanzo</p>
            <h2>Pasión, Sabor <br> y Tradición</h2>
            <a href="#">Sistema de Registro Automatizado de compras,<br> ingresos, Gastos y Control de Inventario</a>
        </div>
    </section>

    <main class="main-content">
    </main>

    <footer class="footer">
        <div class="copyright">
            <p>Desarrollado por WGEMFULL &copy; 2024</p>
            <img src="#" alt="Pagos" width="218" height="71">
        </div>
    </footer>
</body>

</html>

