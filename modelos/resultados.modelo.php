<?php
require_once "conexion.php";

class ModeloResultados
{
	static public function MostrarTiposComidas()
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM tiposcomida");
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
	static public function mdlgetEncuentros($id_jornada)
	{
		$conexion = Conexion::conectar()->prepare("SELECT e.id, (SELECT nombre FROM equipos
		WHERE id = id_eq_local) AS eq_local, (SELECT url_img FROM equipos WHERE id = id_eq_local) AS img_local,
		(SELECT nombre FROM equipos WHERE id = id_eq_visi) AS eq_visi, (SELECT url_img FROM equipos WHERE id = id_eq_visi) 
		AS img_visi,CASE (DATE_FORMAT(e.fecha_p, '%W'))
        WHEN 'Monday' THEN 'Lunes ' WHEN 'Tuesday' THEN 'Martes' 
        WHEN 'Wednesday' THEN 'Miércoles ' WHEN 'Thursday' THEN 'Jueves '
        WHEN 'Friday' THEN 'Viernes ' WHEN 'Saturday' THEN 'Sábado '
        WHEN 'Sunday' THEN 'Domingo ' END dia_partido,DATE_FORMAT(e.fecha_p,'%d') AS dia_mes,
		DATE_FORMAT(e.fecha_p,'%r') as hora_partido FROM encuentros AS e WHERE e.id_jornada  = :id_jornada;");
		$conexion->bindParam("id_jornada", $id_jornada, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
}
