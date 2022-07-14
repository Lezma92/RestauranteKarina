<?php
require_once "conexion.php";

class ModeloResultados
{
	static public function mdlMostrarLigarJornadas()
	{
		$conexion = Conexion::conectar()->prepare("SELECT jor.id AS idJornada, lg.id AS idLiga,
		lg.nombre as nombreLiga, jor.nombre as nombreJornada FROM jornadas AS jor
		INNER JOIN ligas AS lg ON jor.id_ligas = lg.id WHERE jor.estado = 'A'
		AND jor.stats_encuentros = 'Abierto';");
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
	static public function mdlMostrarResultados($id_liga, $id_jornada)
	{
		$conexion = Conexion::conectar()->prepare("SELECT 
		qui.id AS id_quiniela,qui.nombre_quiniela, pt.voto_a, enc.resultado,
		IF(pt.voto_a = enc.resultado,'Verde', IF(enc.resultado = 'C', 'Naranja',
		'Blanco')) AS colorColumna, ifnull((SELECT COUNT(q.id) AS puntos FROM quinielas AS q INNER JOIN
		puntos AS p ON q.id = p.id_quiniela INNER JOIN encuentros AS e ON e.resultado = p.voto_a
		AND e.id = p.id_encuentro WHERE q.id = qui.id GROUP BY p.id_quiniela),0) totalPuntos
		FROM quinielas AS qui INNER JOIN puntos AS pt ON qui.id = pt.id_quiniela LEFT JOIN 
		encuentros AS enc ON enc.id = pt.id_encuentro WHERE qui.id_ligas = :ID_LIGAS AND qui.id_jornada = :ID_JORNADA 
		GROUP BY qui.id , pt.id
	ORDER BY totalPuntos DESC , qui.id , enc.id ASC");
		$conexion->bindParam("ID_LIGAS", $id_liga, PDO::PARAM_INT);
		$conexion->bindParam("ID_JORNADA", $id_jornada, PDO::PARAM_INT);

		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}

	static public function mdlMisQuinielas($id_usuario)
	{
		$conexion = Conexion::conectar()->prepare("SELECT q.id AS idQuinielas, q.id_ligas AS idLigas,q.id_jornada AS idJornada,
		q.id_acceso AS idAcceso, q.nombre_quiniela AS nomQuiniela,j.nombre AS nomJornada, (SELECT nombre FROM ligas	WHERE 
		id = q.id_ligas) nomLigas, q.fecha_registro, DATE_ADD(q.fecha_registro,	INTERVAL 3 DAY) AS diasAtras FROM quinielas AS q
		INNER JOIN jornadas AS j ON j.id = q.id_jornada WHERE q.id_acceso = :idacceso AND DATE_ADD(q.fecha_registro, 
		INTERVAL 10 DAY) > CURRENT_TIMESTAMP() AND j.estado = 'A' OR j.estado = 'D' GROUP BY q.id;");
		$conexion->bindParam("idacceso", $id_usuario, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
	static public function mdlQuinielasxJornada($id_usuario,$id_joranda)
	{
		$conexion = Conexion::conectar()->prepare("SELECT 
		q.id AS idQuinielas, q.id_ligas AS idLigas,q.id_jornada AS idJornada,q.id_acceso AS idAcceso,
		q.nombre_quiniela AS nomQuiniela, j.nombre AS nomJornada,(SELECT nombre	FROM ligas 
		WHERE id = q.id_ligas) nomLigas, q.fecha_registro, DATE_ADD(q.fecha_registro, INTERVAL 3 DAY) 
		AS diasAtras FROM quinielas AS q INNER JOIN	jornadas AS j ON j.id = q.id_jornada WHERE
		q.id_acceso = :idacceso AND j.id = :id_joranda	AND DATE_ADD(q.fecha_registro,INTERVAL 10 DAY) > CURRENT_TIMESTAMP()
		AND j.estado = 'A' OR j.estado = 'D' GROUP BY q.id ORDER BY q.fecha_registro DESC;");
		$conexion->bindParam("idacceso", $id_usuario, PDO::PARAM_INT);
		$conexion->bindParam("id_joranda", $id_joranda, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
	static public function mdlVerJuego($idQuiniela){
		$conexion = Conexion::conectar()->prepare("SELECT GROUP_CONCAT(p.voto_a SEPARATOR ' ') as jugada 
		FROM puntos as p where p.id_quiniela = :idQuiniela;");
		$conexion->bindParam("idQuiniela", $idQuiniela, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetch();
		}
	}
}
