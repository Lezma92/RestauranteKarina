<?php

require_once "controlador/plantilla.controlador.php";
require_once "controlador/ruta.controlador.php";

require_once "controlador/quinielas.controlador.php";
require_once "modelos/quinielas.modelo.php";

require_once "controlador/resultados.controlador.php";
require_once "modelos/resultados.modelo.php";




// require_once "controladores/usuarios.controlador.php";
// require_once "modelos/usuarios.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
