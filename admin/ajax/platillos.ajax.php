<?php

require_once "../controlador/jornadas.controlador.php";
require_once "../modelos/jornadas.modelo.php";


class AjaxPlatillos
{
	public function RegistrarCategoriaPlatillo()
	{
		$respuesta = ControladorJornadas::ctrCrearCategoria();
		echo json_encode($respuesta);
	}
	public function add_platillo()
	{
		$respuesta = ControladorJornadas::ctrAddPlatillo();
		echo json_encode($respuesta);
	}
	public function ActualizarCategoriaPlatillo()
	{
		$respuesta = ControladorJornadas::ctrActualizarCategoria();
		echo json_encode($respuesta);
	}


	public function EliminarTipoComida()
	{
		$respuesta = ControladorJornadas::ctrEliminarTipoComida();
		echo json_encode($respuesta);
	}
	public function EliminarPlatillos()
	{
		$respuesta = ControladorJornadas::crtEliminarPlatilloPrecio();
		echo json_encode($respuesta);
	}
}

//llamado de funcion para guardar categoria de platillos
if (isset($_POST["nom_categoria"])) {
	$registro = new AjaxPlatillos();
	$registro->RegistrarCategoriaPlatillo();
}
//llamado de funcion para actualizar categoria de platillos
if (isset($_POST["act_nom_categoria"])) {
	$registro = new AjaxPlatillos();
	$registro->ActualizarCategoriaPlatillo();
}


if (isset($_POST["EliminarPlatillos"])) {
	$registro = new AjaxPlatillos();
	$registro->EliminarTipoComida();
}
if (isset($_POST["Platilloos"])) {
	$registro = new AjaxPlatillos();
	$registro->EliminarPlatillos();
}

if (isset($_POST["nombre_platillo"])) {
	$registro = new AjaxPlatillos();
	$registro->add_platillo();
}
