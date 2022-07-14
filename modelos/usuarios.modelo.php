<?php

require_once "conexion.php";

class ModeloUsuarios
{
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlValidar($tabla, $item, $valor)
	{
		$stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch();
	}
	static public function mdlMostrarUsuarios($tabla, $item, $valor)
	{
		$stmt = null;
		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			$datos = $stmt->fetch();
			if ($datos == "" || $datos == null) {
				return "Sin datos";
			}
			return $datos;
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}


		$stmt->close();

		$stmt = null;
	}

	static public function mdlRegUsuario($tabla, $datos)
	{
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (null,:nombre, :apps,:tel, :usuario, :password, :tipo_usuario, :estado,:ult_conexion)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apps", $datos["apps"], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_usuario", $datos["tipo_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":ult_conexion", $datos["ult_conexion"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
