<?php
require_once "conexion.php";

class ModeloEncuentros
{
	/*=============================================
	REGISTRO DE LIGAS DE FUTBOL
	=============================================*/
	static public function mdlRegistrarEncuentros($tabla, $datos)
	{
		//INTO `encuentros`(`id`, `id_jornada``, `id_eq_local`, `id_eq_visi`, `resultado`) 

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (null,:id_jornada,(select id from equipos where nombre=:nombre_local),(select id from equipos where nombre=:nombre_visit),:resultado,:fecha_p)");
		$stmt->bindParam(":id_jornada", $datos["id_jornada"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre_local", $datos["equi_local"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_visit", $datos["equi_visit"], PDO::PARAM_STR);
		$stmt->bindParam(":resultado", $datos["resultado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_p", $datos["fecha_p"], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return "Listo";
		} else {
			return "error";
		}
		$stmt->close();

		$stmt = null;
	}

	static public function mdlGetFecCierre($id_jornada)
	{
		$conexion = Conexion::conectar()->prepare("SELECT  lg.id AS id_ligas,
        lg.nombre AS nombre_liga,
        jor.id AS id_jornada,CASE (DATE_FORMAT(jor.fecha_hora_cierre, '%W'))
        WHEN 'Monday' THEN 'Se cierra el Lunes a las ' WHEN 'Tuesday' THEN 'Se cierra el  Martes a las ' 
        WHEN 'Wednesday' THEN 'Se cierra el  Miércoles a las ' WHEN 'Thursday' THEN 'Se cierra el Jueves a las '
        WHEN 'Friday' THEN 'Se cierra el Viernes a las ' WHEN 'Saturday' THEN 'Se cierra el Sábado a las '
        WHEN 'Sunday' THEN 'Se cierra el Domingo a las' END dia_cierre, 
        jor.nombre AS nombre_jornada,DATE_FORMAT(jor.fecha_hora_cierre,'%r') as hora_cierre FROM ligas AS lg 
        INNER JOIN jornadas AS jor ON lg.id = jor.id_ligas 
        WHERE lg.estado = 'Activo' and jor.id = ".$id_jornada." AND jor.stats_encuentros = 'Abierto' and  jor.fecha_hora_cierre > CURRENT_TIMESTAMP();");
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}

	static public function mdlMostrarEncuentros($valor)
	{

		// $conexion = Conexion::conectar()->prepare("SELECT 
		// tabla.id as id_encuentro, tabla.id_jornada, tabla.resultado,(SELECT 
		// id FROM equipos WHERE nombre = tabla.equipo_local) id_equi_local,
		// (SELECT id FROM equipos WHERE nombre = tabla.equipo_visitante) id_equi_visit,
		// (SELECT nombre from jornadas where id = tabla.id_jornada) as jornada,tabla.equipo_local,
		// tabla.equipo_visitante,  (SELECT url_img FROM equipos WHERE nombre = tabla.equipo_local) url_img_local,
		// (SELECT url_img FROM equipos WHERE nombre = tabla.equipo_visitante) url_img_visi,
		// (SELECT stats_encuentros FROM jornadas WHERE id = tabla.id_jornada) stats_encuentros FROM
		// (SELECT id, id_jornada, resultado,(SELECT nombre FROM equipos WHERE id = en.id_eq_local) equipo_local,
		// (SELECT nombre FROM equipos WHERE id = en.id_eq_visi) equipo_visitante FROM encuentros AS en
		// WHERE en.id_jornada = :id_jornada
		// GROUP BY en.id) tabla");
		$conexion = Conexion::conectar()->prepare("call mostrarEncuentros(:id_jornada);");
		$conexion->bindParam(":id_jornada", $valor, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
	static public function mdlVerPremios($id_jornada)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM premios WHERE id_jornada = $id_jornada;");
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}

	static public function mdlEliminarPremios($id_jornada)
	{
		$conexion = Conexion::conectar()->prepare("DELETE FROM premios WHERE id_jornada = $id_jornada;");
		if ($conexion->execute()) {
			return "Listo";
		}
	}
	static public function mdlStatEncuentros($id_jornada)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM jornadas WHERE id = $id_jornada");
		if ($conexion->execute()) {
			return $conexion->fetch();
		}
	}

	static public function mdlActStadoEncuentros($id_jornada, $estado)
	{
		$conexion = Conexion::conectar()->prepare("UPDATE jornadas SET stats_encuentros = :STADO WHERE id = :id_jornada");
		$conexion->bindParam(":id_jornada", $id_jornada, PDO::PARAM_INT);
		$conexion->bindParam(":STADO", $estado, PDO::PARAM_STR);

		if ($conexion->execute()) {
			return "Listo";
		} else {
			return "error";
		}
		$conexion->close();

		$conexion = null;
	}
	static public function mdlEliminarEncuentros($id_encuentros)
	{
		$conexion = Conexion::conectar()->prepare("DELETE FROM encuentros WHERE id = :id_encuentros");
		$conexion->bindParam(":id_encuentros", $id_encuentros, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return "Listo";
		} else {
			return "error";
		}
		$conexion->close();

		$conexion = null;
	}
	static public function mdlAddPuntos($datos)
	{
		$conexion = Conexion::conectar()->prepare("UPDATE encuentros  SET resultado = :resultado WHERE id =:id_encuentro");
		$conexion->bindParam(":resultado", $datos["resultado"], PDO::PARAM_STR);
		$conexion->bindParam(":id_encuentro", $datos["id_encuentro"], PDO::PARAM_INT);
		if ($conexion->execute()) {
			return "Listo";
		} else {
			return "error";
		}
	}
	static public function mdlAddPremios($datos)
	{
		//premios`(`id`, `id_jornada`, `lugar`, `premio`) 
		$conexion = Conexion::conectar()->prepare("INSERT INTO premios VALUES(NULL,:id_jornada,:lugar," . $datos["premio"] . ")");
		$conexion->bindParam(":id_jornada", $datos["id_jornada"], PDO::PARAM_INT);
		$conexion->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);

		if ($conexion->execute()) {
			return "Listo";
		} else {
			return "error";
		}
	}

	static public function mdlUpdPremios($datos)
	{
		//premios`(`id`, `id_jornada`, `lugar`, `premio`) 
		$conexion = Conexion::conectar()->prepare("INSERT INTO premios VALUES(NULL,:id_jornada,:lugar," . $datos["premio"] . ")");
		$conexion->bindParam(":id_jornada", $datos["id_jornada"], PDO::PARAM_INT);
		$conexion->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);

		if ($conexion->execute()) {
			return "Listo";
		} else {
			return "error";
		}
	}
}