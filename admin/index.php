<?php

require_once "controlador/plantilla.controlador.php";
require_once "controlador/ruta.controlador.php";

require_once "controlador/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controlador/jornadas.controlador.php";
require_once "modelos/jornadas.modelo.php";

require_once "controlador/resultados.controlador.php";
require_once "modelos/resultados.modelo.php";


require_once "controlador/reservaciones.controlador.php";
require_once "modelos/reservaciones.modelo.php";


require_once "controlador/encuentros.controlador.php";
require_once "modelos/encuentros.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
