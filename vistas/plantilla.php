<?php

$ruta = ControladorRuta::ctrRuta();
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restaurante la Barrita</title>

    <base href="vistas/">

    <link rel="icon" href="img/l_fb.png">

    <!--=====================================
	VÍNCULOS CSS
	======================================-->
    <link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="../dist/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
    <?php
    include "paginas/modulos/menu.php";
    /*=============================================
PÁGINAS 
=============================================*/



    if (isset($_GET["pagina"])) {

        if ($_GET["pagina"] == "login") {
            if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
                if ($_SESSION["tipo_usuario"] == "Administrador" || $_SESSION["tipo_usuario"] == "Soporte_ti") {
                    echo '<script>window.location = "http://localhost/quinielas/admin/";</script>';
                    //echo '<script>window.location = "http://miniprogol.com/admin/";</script>';
                }
                if ($_SESSION["tipo_usuario"] == "Cliente") {
                    echo '<script>window.location = "http://localhost/quinielas/client/";</script>';
                    //echo '<script>window.location = "http://miniprogol.com/client/";</script>';

                }
            } else {
                include "paginas/login.php";
            }
        } elseif ($_GET["pagina"] == "registrate") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } elseif ($_GET["pagina"] == "carta") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } elseif ($_GET["pagina"] == "galeria") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } elseif ($_GET["pagina"] == "reservaciones") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } elseif ($_GET["pagina"] == "login") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } elseif ($_GET["pagina"] == "estado") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } elseif ($_GET["pagina"] == "contactanos") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } else {
            include "paginas/404.php";
        }
    } else {
        include "paginas/inicio.php";
        // include "paginas/modulos/footer.php";
    }

    ?>
    <?php include "paginas/modulos/footer.php"; ?>
</body>


</html>