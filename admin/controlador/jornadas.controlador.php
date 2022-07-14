<?php
class ControladorJornadas
{
    static public function ctrCrearJornadas()
    {
        if (isset($_POST["input_nombre_jornada"])) {
            $id_liga = $_POST["id_liga"];
            $tabla = "jornadas";
            $datos = array(
                "id_liga" => $id_liga,
                "nombre" => $_POST["input_nombre_jornada"],
                "estado" => 'A',
                "stats_encuentro" => "Captura",
                "fecha_hora_cierre" => $_POST["fecha_hora_cierre"]
            );
            $respuesta = ModeloJornadas::mdlRegisJornada($tabla, $datos);

            return $respuesta;
        }
    }


    static public function ctrAddPlatillo()
    {

        if (isset($_POST["nombre_platillo"])) {
            $tabla = "platillosprecios";

            $hoy = date("d-m-Y-H.i.s");
            $img = $_FILES["img_ilustracion"]["name"];
            list($nom, $tipo_dat) = explode(".", $img);
            $img = $hoy . "." . $tipo_dat;
            $archivo = $_FILES["img_ilustracion"]["tmp_name"];
            $ruta = "../../img_platillos/" . $img;
            move_uploaded_file($archivo, $ruta);

            $datos = array(
                "nombre_platillo" => $_POST["nombre_platillo"],
                "descripcion" => $_POST["eqt_descripcion"],
                "img_ilustracion" => $img,
                "etq_precioxu" => $_POST["etq_precioxu"],
                "etq_precioxp" => $_POST["etq_precioxp"],
                "id_categoria_platillo" => $_POST["id_categoria_platillo"]
            );
            $respuesta = ModeloJornadas::mdlRegistrarPlatillos($tabla, $datos);


            return $respuesta;
        }
    }

    static public function ctrCrearCategoria()
    {
        if (isset($_POST["nom_categoria"])) {
            $tabla = "tiposcomida";
            $archivo = $_FILES["imagen"]["tmp_name"];
            $file_principal = fopen($archivo, 'rb'); //leer el archivo como binario
            $datos = array(
                "nombre" => $_POST["nom_categoria"],
                "descripcion" => $_POST["descripcion"],
                "imagen" => $file_principal
            );
            $respuesta = ModeloJornadas::mdlRegistrarCategorias($tabla, $datos);
            return $respuesta;
        }
    }
    static public function ctrActualizarCategoria()
    {
        if (isset($_POST["act_nom_categoria"])) {
            $tabla = "tiposcomida";
            $file_principal = "SinImagen";
            if ($_FILES["act_imagen"]["tmp_name"] != null) {
                $archivo = $_FILES["act_imagen"]["tmp_name"];
                $file_principal = fopen($archivo, 'rb'); //leer el archivo como binario
            }

            $datos = array(
                "id" => $_POST["act_id"],
                "nombre" => $_POST["act_nom_categoria"],
                "descripcion" => $_POST["act_descripcion"],
                "imagen" => $file_principal
            );
            $respuesta = ModeloJornadas::mdlActualizarCategorias($tabla, $datos);


            return $respuesta;
        }
    }

    static public function ctrListarPlatillos($id_categoria)
    {
        $respuesta = ModeloJornadas::mdlListarPlatillos($id_categoria);
        return $respuesta;
    }

  
    static public function ctrTiposComidas()
    {
        $tabla = "tiposcomida";
        $respuesta = ModeloJornadas::mdlComidas($tabla);
        return $respuesta;
    }
    static public function ctrEliminarTipoComida()
    {
        $tabla = "tiposcomida";
        $id_platillo = $_POST["id_platillo"];
        $respuesta = ModeloJornadas::mdlEliminar($tabla, $id_platillo);
        return $respuesta;
    }
    static public function crtEliminarPlatilloPrecio()
    {
        $tabla = "platillosprecios";
        $id_platillo = $_POST["id_platillo"];

        $listaPlatillos = ModeloJornadas::mdlgetPlatillos($tabla, $id_platillo);
        $RutaEliminar = "../../img_platillos/" . $listaPlatillos["url_img"];
        unlink($RutaEliminar);
        $respuesta = ModeloJornadas::mdlEliminar($tabla, $id_platillo);
        return $respuesta;
    }
    static public function ctrDesactivarLigas()
    {
        $tabla = "ligas";
        $id_liga = $_POST["id_liga"];
        $estado = $_POST["estado_liga"];
        $respuesta = ModeloJornadas::mdlEstadoLiga($tabla, $id_liga, $estado);
        return $respuesta;
    }
}
