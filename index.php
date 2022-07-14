<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/reservaciones.controlador.php";
require_once "modelos/reservaciones.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
