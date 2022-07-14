<?php 
require_once "../modelos/usuarios.modelo.php";
require_once "../controladores/usuarios.controlador.php";

class AjaxUsuarios{



	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	
	public function Registrar_Usuario(){

		$respuesta = ControladorUsuarios::ctrCrearUsuario();
	  
		echo json_encode($respuesta);
  
	  }
	public function ajaxValidarUsuario(){
		$item = "usuario";
		$valor = $_POST["validarUsuario"];
		$respuesta = ControladorUsuarios::ctrlValidarUsuarios($item,$valor);
		echo json_encode($respuesta);

	}


}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset($_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> ajaxValidarUsuario();

}
if(isset($_POST["input_nombre_user"])){

	$registro = new AjaxUsuarios();
	$registro -> Registrar_Usuario();

}