<?php
class ControladorUsuarios2
{



	static public function ctrlMostrarUsuarios()
	{
		$res = ModeloUsuarios::mdlMostrarUsuarios();
		return $res;
	}
	static public function ctrlValidarUsuarios($item, $valor)
	{
		$tabla = "usuarios";
		$res = ModeloUsuarios::mdlValidar($tabla, $item, $valor);

		return $res;
	}
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario()
	{

		if (isset($_POST["input_user"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["input_nombre_user"])) {
			
				$pass = $_POST["input_pass"];
				$encriptar = crypt($pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$datos = array(
					"nombre" => $_POST["input_nombre_user"],
					"apps" => $_POST["input_apps_user"],
					"tel" => $_POST["input_tel"],
					"usuario" => $_POST["input_user"],
					"password" => $encriptar,
					"tipo_usuario" => $_POST["input_perfil"],
					"estado" => 1,
					"ult_conexion" => "0000-00-00 00:00:00"
				);
				$respuesta = ModeloUsuarios::mdlIngresarUsuario($datos);
				return $respuesta;
			}
		}
	}

	/*=============================================
	EDITAR DE USUARIO
	=============================================*/

	static public function ctrEditarUsuario()
	{

		if (isset($_POST["input_user_E"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["input_nombre_user_E"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["input_user_E"])
			) {
				$tabla = "usuarios";
				$pass = $_POST["input_pass_e"];
				$refres = $_POST["modal_es_edi"];
				$encriptar = crypt($pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array(
					"id_usuario"=>$_POST["id_user_edi"],
					"nombre" => $_POST["input_nombre_user_E"],
					"tel" => $_POST["input_tel_e"],
					"apps" => $_POST["input_apps_user_E"],
					"usuario" => $_POST["input_user_E"],
					"password" => $encriptar,
					"tipo_usuario" => $_POST["input_perfil_E"],
				);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if ($respuesta == "ok") {
					if ($refres == 1) {
						echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El usuario ha sido guardado actualizado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "../usuarios";

						}

					});
				

					</script>';
					}if($refres == 2){
						echo '<script>

						Swal.fire({
	
							type: "success",
							title: "¡El usuario ha sido guardado actualizado!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
	
						}).then(function(result){
	
							if(result.value){
							
								window.location = "../clientes";
	
							}
	
						});
					
	
						</script>';
					}
					
				}
			} else {

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';
			}
		}
	}

	static public function ctrEliminarUsuario($id)
	{
		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla, $id);
		return $respuesta;
	}
}