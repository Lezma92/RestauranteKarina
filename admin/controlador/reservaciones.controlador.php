<?php
class ControladorReservaciones
{
    static public function verReservacionesEspera()
    {
        $respuesta = ModeloReservaciones::getReservacionesEspera();

        return $respuesta;
    }

    static public function datos_reservacion($id_reservacion)
    {
        $respuesta = ModeloReservaciones::getDatosReservaciones($id_reservacion);

        return $respuesta;
    }
   

    static public function ctrlVerReservaciones($item, $valor)
	{
		$tabla = "reservaciones";

		$res = ModeloReservaciones::mdlgetDatosReservacion($tabla, $item, $valor);

		return $res;
	}

	

	/*=============================================
	EDITAR DE USUARIO
	=============================================*/

	static public function ctrEditarReservacion()
	{

		if (isset($_POST["id_reservacion"])) {
			if (
				preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_POST["etq_apm"]) &&
				preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_POST["etq_app"]) && 
				preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_POST["input_nombre_user_E"])
			) {
				$tabla = "reservaciones";
				$refres = $_POST["modal_es_edi"];

				$datos = array(
					"id_reservacion"=>$_POST["id_reservacion"],
					"nombre" => $_POST["input_nombre_user_E"],
					"a_paterno" => $_POST["etq_app"],
					"a_materno" => $_POST["etq_apm"],
					"tel" => $_POST["etq_nTel"],
					"correo" => $_POST["etq_correo"],
					"c_personas" => $_POST["etq_Ctdpersonas"],
					"fecha_hora" => $_POST["fecha_hora"],
				);

				$respuesta = ModeloReservaciones::mdlEditarReservacion($tabla, $datos);

				if ($respuesta == "ok") {
					if ($refres == 1) {
						echo '<script>

					Swal.fire({

						type: "success",
						title: "¡Reservación actualizada con exito!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "../inicio";

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
							
								window.location = "../inicio";
	
							}
	
						});
					
	
						</script>';
					}
					
				}
			} else {

				echo '<script>

					swal({

						type: "error",
						title: "¡los campos no pueden estar vacios o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "inicio";

						}

					});
				

				</script>';
			}
		}
	}

	static public function ctrEliminarReservacion($id)
	{
		$tabla = "reservaciones";
		$respuesta = ModeloReservaciones::mdlEliminarReservacion($tabla, $id);
		return $respuesta;
	}
    
    
    
}
