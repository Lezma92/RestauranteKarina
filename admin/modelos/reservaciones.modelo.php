<?php
require_once "conexion.php";

class ModeloReservaciones
{

    static public function getReservacionesEspera()
    {
        $conexion = Conexion::conectar()->prepare("SELECT 
         st_re.id AS id_statu,
    re.id AS idReservacion,
    st_re.usr_temp,
    re.n_telefono,
    re.correo,
    st_re.pws_temp,
        st_re.estado,re.c_personas,
        CONCAT(re.nombre,
                ' ',
                re.a_paterno,
                ' ',
                a_materno) AS nomCompleto,
        CASE (DATE_FORMAT(re.fecha_hora, '%W'))
            WHEN 'Monday' THEN 'Lunes '
            WHEN 'Tuesday' THEN 'Martes'
            WHEN 'Wednesday' THEN 'Miércoles '
            WHEN 'Thursday' THEN 'Jueves '
            WHEN 'Friday' THEN 'Viernes '
            WHEN 'Saturday' THEN 'Sábado '
            WHEN 'Sunday' THEN 'Domingo '
        END dia_entrada,
        DATE_FORMAT(re.fecha_hora, '%d') AS dia_mes,
        DATE_FORMAT(re.fecha_hora, '%M') AS mes,
        DATE_FORMAT(re.fecha_hora, '%r') AS hora,
        DATE_FORMAT(re.fecha_registro, '%d/%m/%y') AS f_registro,
        re.fecha_hora AS fecha_entrada
    FROM
        status_reservacion AS st_re
            INNER JOIN
        reservaciones AS re ON re.id = st_re.id_reservacion
    WHERE
        st_re.estado = 'Espera';");
        if ($conexion->execute()) {
            return $conexion->fetchAll();
        }
    }

    static public function getDatosReservaciones($id_reservacion)
    {
        $conexion = Conexion::conectar()->prepare("select * from reservaciones where id = :id_reservacion;");

        $conexion->bindParam(":id_reservacion", $id_reservacion, PDO::PARAM_INT);

        if ($conexion->execute()) {
            return $conexion->fetchAll();
        }
    }


    static public function mdlEliminarReservacion($tabla, $id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id;");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEditarReservacion($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,a_paterno = :a_paterno,a_materno = :a_materno,n_telefono = :n_telefono,correo=:correo,fecha_hora = :fecha_hora ,c_personas = :c_personas  WHERE id = :id_reservacion;");
        $stmt->bindParam(":id_reservacion", $datos["id_reservacion"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":a_paterno", $datos["a_paterno"], PDO::PARAM_STR);
        $stmt->bindParam(":a_materno", $datos["a_materno"], PDO::PARAM_STR);
        $stmt->bindParam(":n_telefono", $datos["tel"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_hora", $datos["fecha_hora"], PDO::PARAM_STR);
        $stmt->bindParam(":c_personas", $datos["c_personas"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }
    static public function mdlgetDatosReservacion($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }
}
