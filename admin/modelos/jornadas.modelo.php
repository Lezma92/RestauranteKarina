<?php
require_once "conexion.php";

class ModeloJornadas
{
	/*=============================================
	Este método permite la inserción de nuevas categorias en la tabla tiposdecomida
	=============================================*/
	static public function mdlRegistrarCategorias($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (null,:nombre,:descripcion,:img_portada,CURDATE())");
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":img_portada", $datos["imagen"], PDO::PARAM_LOB);
		if ($stmt->execute()) {
			return "Listo";
		} else {
			return "error";
		}
		$stmt->close();

		$stmt = null;
	}

	static public function mdlRegistrarPlatillos($tabla, $datos)
	{
		//`platillosprecios`(`id`, `id_TiposComida`, `nombrePlatillo`, `url_img`, `precio_unitario`, `precio_paquete`, `descripcion`)
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (null,:id_categoria_platillo,:nombre_platillo,:img_ilustracion,:etq_precioxu,:etq_precioxp,:descripcion)");
		$stmt->bindParam(":id_categoria_platillo", $datos["id_categoria_platillo"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre_platillo", $datos["nombre_platillo"], PDO::PARAM_STR);
		$stmt->bindParam(":img_ilustracion", $datos["img_ilustracion"], PDO::PARAM_LOB);
		$stmt->bindParam(":etq_precioxu", $datos["etq_precioxu"], PDO::PARAM_STR);
		$stmt->bindParam(":etq_precioxp", $datos["etq_precioxp"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return "Listo";
		} else {
			return "error";
		}
		$stmt->close();

		$stmt = null;
	}
	static public function mdlActualizarCategorias($tabla, $datos)
	{
		$sql = "UPDATE $tabla SET nomTipo = :nombre,descripcion = :descripcion WHERE id = :id";
		if ($datos["imagen"] != "SinImagen") {
			$sql = "UPDATE $tabla SET nomTipo = :nombre,descripcion = :descripcion, img_portada = :img_portada WHERE id = :id";
		}
		$stmt = Conexion::conectar()->prepare($sql);

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		if ($datos["imagen"] != "SinImagen") {
			$stmt->bindParam(":img_portada", $datos["imagen"], PDO::PARAM_LOB);
		}

		if ($stmt->execute()) {
			return "Listo";
		} else {
			return "error";
		}
		$stmt->close();

		$stmt = null;
	}
	static public function mdlEliminar($tabla, $campo)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = $campo;");
		if ($stmt->execute()) {
			return "Listo";
		}
		$stmt->close();
		$stmt = null;
	}

	static public function mdlComidas($tabla)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM $tabla;");
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}

	static public function mdlgetPlatillos($tabla,$id)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = $id;");
		if ($conexion->execute()) {
			return $conexion->fetch();
		}
	}

	static public function mdlListarPlatillos($id_categoria)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM platillosprecios WHERE id_TiposComida = :id_categoria");
		$conexion->bindParam(":id_categoria", $id_categoria, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
}
