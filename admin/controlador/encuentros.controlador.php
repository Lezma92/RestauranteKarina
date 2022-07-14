<?php
class ControladorEncuentros
{
    static public function ctrCrearEncuentros()
    {
        if (isset($_POST["equi_local"]) && isset($_POST["equi_visit"]) && isset($_POST["id_jornada"])) {
            $equi_local = $_POST["equi_local"];
            $equi_visit = $_POST["equi_visit"];
            $fecha_p = $_POST["fecha_p"];
            $id_jornada = $_POST["id_jornada"];
            $tabla = "encuentros";

            //INTO `encuentros`(`id`, `id_jornada`, `posicion_partido`, `id_eq_local`, `id_eq_visi`, `resultado`)
            $datos = array(
                "id_jornada" => $id_jornada,
                "equi_local" => $equi_local,
                "equi_visit" => $equi_visit,
                "fecha_p" => $fecha_p,
                "resultado" => "S/R"
            );
            $respuesta = ModeloEncuentros::mdlRegistrarEncuentros($tabla, $datos);

            return $respuesta;
        }
    }

    static public function ctrCrearLigas()
    {
        if (isset($_POST["input_nombre_liga"])) {
            $tabla = "ligas";
            $archivo = $_FILES["imagen"]["tmp_name"];
            $file_principal = fopen($archivo, 'rb'); //leer el archivo como binario
            echo ($file_principal);
            $datos = array(
                "nombre" => $_POST["input_nombre_liga"],
                "imagen" => $file_principal,
                "estado" => 'Activo'
            );
            $respuesta = ModeloJornadas::mdlRegisLigas($tabla, $datos);


            return $respuesta;
        }
    }

    static public function crtGetFechaCierre($id_jornada){
        $respuesta = ModeloEncuentros::mdlGetFecCierre($id_jornada);

        return $respuesta;

    }
    static public function ctrVerEncuentros($valor)
    {
        $respuesta = ModeloEncuentros::mdlMostrarEncuentros($valor);
        return $respuesta;
    }
    static public function crtMostrarPremios($id_jornada){
        $respuesta = ModeloEncuentros::mdlVerPremios($id_jornada);
        return $respuesta;
    }
    static public function ctrSelectNombreJornada($valor)
    {
        $tabla = "jornadas";
        $campo = "id";
        $respuesta = ModeloJornadas::mdlMostrarNombreJornada($tabla, $campo, $valor);
        return $respuesta;
    }
    static public function ctrSelectLigas()
    {
        $tabla = "ligas";
        $respuesta = ModeloJornadas::mdlMostrarLigas($tabla, "Activo");
        return $respuesta;
    }

    static public function crtListarEquipos()
    {
        $tabla = "equipos";
        $respuesta = ModeloJornadas::mdlMostrarEquipos($tabla);

        return $respuesta;
    }
    static public function crtStatsEncuentros($id_jornada)
    {
        $respuesta = ModeloEncuentros::mdlStatEncuentros($id_jornada);

        return $respuesta;
    }
    static public function crtActualizarEncuentro()
    {
        $respuesta = ModeloEncuentros::mdlActStadoEncuentros($_POST["id_jornada"], $_POST["estado"]);
        return $respuesta;
    }
    static public function crtEliminarEncuentros()
    {
        $respuesta = ModeloEncuentros::mdlEliminarEncuentros($_POST["id_encuentro"]);
        return $respuesta;
    }
    static public function crtAddPuntos()
    {
        $resultado = "";
        if (isset($_POST["equipo"])) {
            $resultado = $_POST["equipo"];
        }

        if (isset($_POST["encCancelado"])) {
            $cancelar = $_POST["encCancelado"];
            if ($cancelar == "Cancelar") {
                $resultado = "C";
            }
        }
        $nvo = array(
            'resultado' => $resultado,
            'id_encuentro' => $_POST["id_encuentro"]
        );
        if ($resultado != "") {
            $okPuntos = ModeloEncuentros::mdlAddPuntos($nvo);
            return $okPuntos;
        }
    }

    static public function crtEliminarPremios(){
        $respuesta = ModeloEncuentros::mdlEliminarPremios($_POST["idJornadaPremios"]);
        return $respuesta;
    }
    static public function crtAddPremios()
    {
        //(NULL,:id_jornada,:lugar,:premio)
        $cantPremios = $_POST["radio_premio"];
        $lugar = "1er Lugar";
        if ($cantPremios == "option1") {
            $datos = array(
                'id_jornada' => $_POST["idJornadaPremios"],
                'lugar' => $lugar,
                'premio' => $_POST["premio1"]
            );



            $respuesta = ModeloEncuentros::mdlAddPremios($datos);
            return $respuesta;
        }
        if ($cantPremios == "option2") {
            for ($i=1; $i <= 2; $i++) { 
                if ($i == 1) {
                    $lugar = "1er Lugar";
                }
                if ($i == 2) {
                    $lugar = "2do Lugar";
                }
                $datos = array(
                    'id_jornada' => $_POST["idJornadaPremios"],
                    'lugar' => $lugar,
                    'premio' => $_POST["premio".$i]
                );
                $respuesta = ModeloEncuentros::mdlAddPremios($datos);
            }
           
            return $respuesta;
        }
        if ($cantPremios == "option3") {
            for ($i=1; $i <= 3; $i++) { 
                if ($i == 1) {
                    $lugar = "1er Lugar";
                }
                if ($i == 2) {
                    $lugar = "2do Lugar";
                }
                if ($i == 3) {
                    $lugar = "3er Lugar";
                }
                $datos = array(
                    'id_jornada' => $_POST["idJornadaPremios"],
                    'lugar' => $lugar,
                    'premio' => $_POST["premio".$i]
                );
                $respuesta = ModeloEncuentros::mdlAddPremios($datos);
            }
           
            return $respuesta;
        }
    }
}
