<?php
require_once "conexion.php";
class ReservacionesModelo
{

	static public function RegistrarDatos($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (NULL,:nombre, :a_paterno,:a_materno,:n_telefono, :correo, :fecha_hora, :c_personas,current_timestamp())");
		//(`id`, `nombre`, `a_paterno`, `a_materno`, `n_telefono`, `correo`, `fecha_hora`, `c_personas`)
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":a_paterno", $datos["a_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":a_materno", $datos["a_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":n_telefono", $datos["n_telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_hora", $datos["fecha_hora"], PDO::PARAM_STR);
		$stmt->bindParam(":c_personas", $datos["c_personas"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			$nombre = $datos["nombre"] . " " . $datos["a_paterno"] . " " . $datos["a_materno"];
			$r = ReservacionesModelo::RegisUsuarioTemp($nombre);
			if ($r == "ok") {
				return "ok";
			}
		} else {
			return "error";
		}

		$stmt->close();

		$stmt = null;
	}

	static public function RegisUsuarioTemp($nombre)
	{
		$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$pws_chart = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMN';
		$password =  substr(str_shuffle($pws_chart), 0, 10);
		$usuario_Temporal = "RES_" . substr(str_shuffle($permitted_chars), 0, 5);


		$con = Conexion::conectar()->prepare("INSERT INTO status_reservacion VALUES(NULL,(select id FROM reservaciones WHERE CONCAT(nombre,' ',a_paterno,' ',a_materno) = :nom_completo),'7852411',:usr_temp,:pws_temp,'Espera');");

		$con->bindParam(":nom_completo", $nombre, PDO::PARAM_STR);
		$con->bindParam(":usr_temp", $usuario_Temporal, PDO::PARAM_STR);
		$con->bindParam(":pws_temp", $password, PDO::PARAM_STR);

		if ($con->execute()) {
			$_SESSION["USR_TEMP"] = $usuario_Temporal;
			$_SESSION["PSW_TEMP"] = $password;
			return "ok";
		}
		$con->close();

		$con = null;
	}

	static public function MostrarTiposComidas()
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM tiposcomida");
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
		$conexion->close();

		$conexion = null;
	}

	static public function MostrarPlatillos($id_TiposComida)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM `platillosprecios` WHERE id_TiposComida = :id_TiposComida;");
		$conexion->bindParam(":id_TiposComida", $id_TiposComida, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
		$conexion->close();

		$conexion = null;
	}
}