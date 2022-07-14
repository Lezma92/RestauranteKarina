<?php 
require_once "../controlador/reservaciones.controlador.php";
require_once "../modelos/reservaciones.modelo.php";

class AjaxReservaciones{
	public function eliminarReservacion(){
	
	  $id = $_POST["id_reservacion_eliminar"];		
	  $respuesta = ControladorReservaciones::ctrEliminarReservacion($id);
      echo json_encode($respuesta);
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public function ajaxEditarReservacion(){

		$item = "id";
		$valor = $_POST["id_reservacion"];

		$respuesta = ControladorReservaciones::ctrlVerReservaciones($item, $valor);

		echo json_encode($respuesta);

	}


}


/*===========================================================================
manda a llamar el método que permitirá la edicion de los datos ya registrados
=============================================================================*/
if(isset($_POST["id_reservacion"])){

	$editar = new AjaxReservaciones();
	$editar -> ajaxEditarReservacion();

}
/*===============================================================================================
manda a llamar el método eliminarReservacion que permitirá eliminar la reservación definitivamente
================================================================================================*/

if(isset($_POST["eliminarReservacion"])){

	$registro = new AjaxReservaciones();
	$registro -> eliminarReservacion();

}
