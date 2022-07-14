<?php 
require_once "../controlador/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	public function Registrar_Usuario(){

	  $respuesta = ControladorUsuarios2::ctrCrearUsuario();
	
      echo json_encode($respuesta);

	}

	public function Eliminar_Usuario(){
		// $respuesta = "Bebesita";
		
	  $id = $_POST["idUsuarioE"];		
	  $respuesta = ControladorUsuarios2::ctrEliminarUsuario($id);
	
      echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public function ajaxActivarUsuario(){

		$tabla = "acceso";

		$item1 = "estado";
		$valor1 = $_POST["activarUsuario"];

		$item2 = "id";
		$valor2 = $_POST["activarId"];

		$respuesta = ModeloUsuarios::mdlActualizarUsuario2($tabla, $item1, $valor1, $item2, $valor2);

      echo json_encode($respuesta);


	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $_POST["validarUsuario"];

		
		$respuesta = ControladorUsuarios2::ctrlMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $_POST["idUsuario"];

		$respuesta = ControladorUsuarios2::ctrlMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

	public function ajaxValidarUser(){

		$item = "usuario";
		$valor = $_POST["ValidarUser"];
		$id = $_POST["id_user"];

		$respuesta = ModeloUsuarios::mdlValidarUser($item, $valor,$id);
		// $respuesta = "joto";

		echo json_encode($respuesta);

	}

}

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> ajaxActivarUsuario();

}
/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset($_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> ajaxValidarUsuario();

}


/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> ajaxEditarUsuario();

}


/*=============================================
Validar usuarios
=============================================*/
if(isset( $_POST["ValidarUser"])){

	$valusaer = new AjaxUsuarios();
	$valusaer -> ajaxValidarUser();

}

if(isset($_POST["input_nombre_user"])){

	$registro = new AjaxUsuarios();
	$registro -> Registrar_Usuario();

}

if(isset($_POST["idUsuarioE"])){

	$registro = new AjaxUsuarios();
	$registro -> Eliminar_Usuario();

}
