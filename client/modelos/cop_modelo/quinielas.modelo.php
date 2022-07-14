<?php
require_once "conexion.php";

class ModeloQuinielas
{
    /*=============================================
	Muestra la quinielas que están activas
	=============================================*/
    static public function mdlQuinielasActivas()
    {
        $conexion = Conexion::conectar()->prepare("SELECT  lg.id AS id_ligas,
        lg.nombre AS nombre_liga,lg.src_img AS img_liga,lg.estado AS estado_liga,
        jor.id AS id_jornada,CASE (DATE_FORMAT(jor.fecha_hora_cierre, '%W'))
        WHEN 'Monday' THEN 'Se cierra el Lunes a las ' WHEN 'Tuesday' THEN 'Se cierra el  Martes a las ' 
        WHEN 'Wednesday' THEN 'Se cierra el  Miércoles a las ' WHEN 'Thursday' THEN 'Se cierra el Jueves a las '
        WHEN 'Friday' THEN 'Se cierra el Viernes a las ' WHEN 'Saturday' THEN 'Se cierra el Sábado a las '
        WHEN 'Sunday' THEN 'Se cierra el Domingo a las' END dia_cierre, 
        jor.nombre AS nombre_jornada,DATE_FORMAT(jor.fecha_hora_cierre,'%r') as hora_cierre FROM ligas AS lg 
        INNER JOIN jornadas AS jor ON lg.id = jor.id_ligas 
        WHERE lg.estado = 'Activo' AND jor.stats_encuentros = 'Abierto' and  jor.fecha_hora_cierre > CURRENT_TIMESTAMP();");
        if ($conexion->execute()) {
            return $conexion->fetchAll();
        }
    }
    static public function mdlQuinielasActivasFueraHr()
    {
        $conexion = Conexion::conectar()->prepare("SELECT  lg.id AS id_ligas,
        lg.nombre AS nombre_liga,lg.src_img AS img_liga,lg.estado AS estado_liga,
        jor.id AS id_jornada,CASE (DATE_FORMAT(jor.fecha_hora_cierre, '%W'))
        WHEN 'Monday' THEN 'Se cierra el Lunes a las ' WHEN 'Tuesday' THEN 'Se cierra el  Martes a las ' 
        WHEN 'Wednesday' THEN 'Se cierra el  Miércoles a las ' WHEN 'Thursday' THEN 'Se cierra el Jueves a las '
        WHEN 'Friday' THEN 'Se cierra el Viernes a las ' WHEN 'Saturday' THEN 'Se cierra el Sábado a las '
        WHEN 'Sunday' THEN 'Se cierra el Domingo a las' END dia_cierre, 
        jor.nombre AS nombre_jornada,DATE_FORMAT(jor.fecha_hora_cierre,'%r') as hora_cierre FROM ligas AS lg 
        INNER JOIN jornadas AS jor ON lg.id = jor.id_ligas 
        WHERE lg.estado = 'Activo' AND jor.stats_encuentros = 'Abierto' and  DATE_ADD(jor.fecha_hora_cierre,INTERVAL 1 DAY) > CURRENT_TIMESTAMP();");
        if ($conexion->execute()) {
            return $conexion->fetchAll();
        }
    }

    static public function mdlMostrarQuiniela($valor)
    {
        $conexion = Conexion::conectar()->prepare("call mostrarEncuentros(:id_jornada);");
        $conexion->bindParam(":id_jornada", $valor, PDO::PARAM_INT);
        if ($conexion->execute()) {
            return $conexion->fetchAll();
        }
    }
    static public function mdlRegistrarQuiniela($datos)
    {
        //INSERT INTO `quinielas`(`id`, `id_ligas`, `id_jornada`, `id_acceso`, `nombre_quiniela`)        
        $conexion = Conexion::conectar()->prepare("INSERT INTO quinielas values(null,:id_ligas,:id_jornada,:id_usuario,:nombre_quiniela,UTC_TIMESTAMP())");

        $conexion->bindParam(":id_ligas", $datos["id_liga"], PDO::PARAM_INT);
        $conexion->bindParam(":id_jornada", $datos["id_jornada"], PDO::PARAM_INT);
        $conexion->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $conexion->bindParam(":nombre_quiniela", $datos["nombre_quiniela"], PDO::PARAM_STR);

        if ($conexion->execute()) {
            return "Listo";
        } else {
            print_r($conexion->errorInfo());
        }
    }


    static public function getDatosQuiniela($datos)
    {
        //`id`, `id_ligas`, `id_jornada`, `id_acceso`, `nombre_quiniela` 
        $conexion = Conexion::conectar()->prepare("SELECT id FROM quinielas WHERE id_ligas = :id_ligas and id_jornada = :id_jornada and id_acceso = :id_usuario and nombre_quiniela = :nombre_quiniela  ORDER BY fecha_registro DESC;");
        $conexion->bindParam(":id_ligas", $datos["id_liga"], PDO::PARAM_INT);
        $conexion->bindParam(":id_jornada", $datos["id_jornada"], PDO::PARAM_INT);
        $conexion->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $conexion->bindParam(":nombre_quiniela", $datos["nombre_quiniela"], PDO::PARAM_STR);
        if ($conexion->execute()) {
            return $conexion->fetch();
        }else {
            print_r($conexion->errorInfo());
        }
    }

    static public function mdlInsertarPuntos($id_quiniela,$id_encuentro,$voto_a)
    {
        //INSERT INTO `puntos`(`id`, `id_quiniela`, `id_encuentro`, `voto_a`) 
        $conexion = Conexion::conectar()->prepare("INSERT INTO puntos VALUES(NULL,:id_quiniela,:id_encuentro,:voto_a);");
        $conexion->bindParam(":id_quiniela", $id_quiniela, PDO::PARAM_INT);
        $conexion->bindParam(":id_encuentro", $id_encuentro, PDO::PARAM_INT);
        $conexion->bindParam(":voto_a", $voto_a, PDO::PARAM_STR);
        if ($conexion->execute()) {
            return "OkInsertado";
        } else {
            print_r($conexion->errorInfo());
        }
    }





    public function getDias($fecha)
    {
        $sql = "CASE (DATE_FORMAT($fecha, '%W'))
     WHEN 'Monday' THEN 'Lunes'
     WHEN 'Tuesday' THEN 'Martes'
     WHEN 'Wednesday' THEN 'Miércoles'
     WHEN 'Thursday' THEN 'Jueves'
     WHEN 'Friday' THEN 'Viernes'
     WHEN 'Saturday' THEN 'Sábado'
     WHEN 'Sunday' THEN 'Domingo'
 END dias";
        return $sql;
    }
}