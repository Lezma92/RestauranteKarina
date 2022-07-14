<?php

require_once "../controlador/quinielas.controlador.php";
require_once "../modelos/quinielas.modelo.php";


class AjaxQuinielas
{

	public function registrarQuinielas()
	{
		$respuesta = ControladorQuinielas::ctrAddQuinielas();
		
			echo (json_encode($respuesta));
	
	}
}
//REGISTRAR Encuentro
if (isset($_POST["nombre_quiniela"])) {
	$registro = new AjaxQuinielas();
	$registro->registrarQuinielas();
}else{
	echo (json_encode("SinDatos"));
}