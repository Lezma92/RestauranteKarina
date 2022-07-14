<?php

require_once "../controlador/encuentros.controlador.php";
require_once "../modelos/encuentros.modelo.php";


class AjaxEncuentros
{

	public function RegistrarEncuentros()
	{
		$respuesta = ControladorEncuentros::ctrCrearEncuentros();
		echo json_encode($respuesta);
	}
	public function actStatusEncuentros()
	{
		$respuesta = ControladorEncuentros::crtActualizarEncuentro();
		echo json_encode($respuesta);
	}
	public function actEliminarEncuentros()
	{
		$respuesta = ControladorEncuentros::crtEliminarEncuentros();
		echo json_encode($respuesta);
	}
	public function AddPuntos()
	{
		$respuesta = ControladorEncuentros::crtAddPuntos();
		echo json_encode($respuesta);
	}
	public function AddPremios()
	{
		$isEmty = ControladorEncuentros::crtMostrarPremios($_POST["idJornadaPremios"]);
		if (isset($isEmty)) {
			$deletePremios = ControladorEncuentros::crtEliminarPremios();
			if ($deletePremios == "Listo") {
				$respuesta = ControladorEncuentros::crtAddPremios();
				echo json_encode($respuesta);
			}
		} else {
			$respuesta = ControladorEncuentros::crtAddPremios();
			echo json_encode($respuesta);
		}
	}
}
//REGISTRAR Encuentro
if (isset($_POST["equi_local"]) && isset($_POST["equi_visit"]) && isset($_POST["id_jornada"])) {
	$registro = new AjaxEncuentros();
	$registro->RegistrarEncuentros();
}
//REGISTRA EL ESTADO DE LOS ENCUENTROS  - ABIERTO / CERRADO
if (isset($_POST["accion"])) {
	if ($_POST["accion"] == "GuardarEncuentros") {
		$registro = new AjaxEncuentros();
		$registro->actStatusEncuentros();
	}
	if ($_POST["accion"] == "EliminarEncuentros") {
		$registro = new AjaxEncuentros();
		$registro->actEliminarEncuentros();
	}
}
if (isset($_POST["id_encuentro"]) && isset($_POST["equipo"]) || isset($_POST["encCancelado"])) {
	$registro = new AjaxEncuentros();
	$registro->AddPuntos();
}
if (isset($_POST["identificador"]) && isset($_POST["radio_premio"])) {

	$registro = new AjaxEncuentros();
	$registro->AddPremios();
}
