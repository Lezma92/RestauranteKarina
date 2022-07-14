<?php
require_once "conexion.php";

class ModeloUsuarios
{
	/*=============================================
	OBTENER VENDEDORES
	=============================================*/
	static public function mdlMostrarVendedores($tabla, $item, $valor)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}


	/*=============================================
	OBTENER USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios()
	{
		$stmt = Conexion::conectar()->prepare("SELECT * from usuarios");
		$stmt->execute();

		return $stmt->fetchAll();


		$stmt->close();

		$stmt = null;
	}
	static public function mdlValidar($tabla, $item, $valor)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
	}


	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario2($tabla, $item1, $valor1, $item2, $valor2)
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

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlRegistrarUsuario($datos)
	{
	}


	static public function mdlIngresarUsuario($datos)
	{
		//INTO `usuarios`(`id`, `nombre`, `apellidos`, `alias`, `passw`, `telefono`, `t_usuario`, `ult_conexion`)
		$stmt = Conexion::conectar()->prepare("INSERT INTO usuarios VALUES (null,:nombre, :apps,:alias,:password,:tel,:tipo_usuario, :ult_conexion)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apps", $datos["apps"], PDO::PARAM_STR);
		$stmt->bindParam(":alias", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_usuario", $datos["tipo_usuario"], PDO::PARAM_STR);
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
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombreEditado,apellidos = :appEditado,alias=:usuEditado,telefono = :tel,passw = :passEditado ,t_usuario = :tipusuEditado  WHERE id = :idUsuario;");

		$stmt->bindParam(":idUsuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":nombreEditado", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":appEditado", $datos["apps"], PDO::PARAM_STR);
		$stmt->bindParam(":usuEditado", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":passEditado", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
		$stmt->bindParam(":tipusuEditado", $datos["tipo_usuario"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	REPETIR  USUARIO
	=============================================*/
	static public function mdlValidarUser($item, $valor, $id)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE $item = :$item AND id != :id");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
	static public function mdlEliminarUsuario($tabla, $id)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
