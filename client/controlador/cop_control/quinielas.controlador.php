<?php
class ControladorQuinielas
{

    static public function ctrQuinielasActivas()
    {
        $respuesta = ModeloQuinielas::mdlQuinielasActivas();
        return $respuesta;
    }
    static public function ctrQuinielasActivasFueraHra()
    {
        $respuesta = ModeloQuinielas::mdlQuinielasActivasFueraHr();
        return $respuesta;
    }
    static public function crtMsotrarQuinielas($id_jornada)
    {
        $respuesta = ModeloQuinielas::mdlMostrarQuiniela($id_jornada);
        return $respuesta;
    }


    static public function ctrAddQuinielas()
    {
        if (isset($_POST["nombre_quiniela"]) && $_POST["nombre_quiniela"]!=null && $_POST["nombre_quiniela"] != "") {
            //null,:id_ligas,:id_jornada,:id_usuario,:nombre_quiniel
            $total_encuentros = $_POST["cant_encuentros"];
            $cont = 0;
            for ($i = 0; $i <= $total_encuentros; $i++) {
                if (isset($_POST["opc_sel_" . $i])) {
                    $cont++;
                }
            }
            
            if ($cont == $total_encuentros) {
                $datosQuiniela = array(
                    "id_liga" => $_POST["id_liga"],
                    "id_jornada" => $_POST["id_jornada"],
                    "id_usuario" => $_POST["id_usuario"],
                    "nombre_quiniela" => $_POST["nombre_quiniela"]
                );
                $cont = 0;
                $respuesta = ModeloQuinielas::mdlRegistrarQuiniela($datosQuiniela);
                if ($respuesta == "Listo") {
                    $id_quiniela = ModeloQuinielas::getDatosQuiniela($datosQuiniela);
                    for ($i = 1; $i <= $total_encuentros; $i++) {
                        $add_puntos = ModeloQuinielas::mdlInsertarPuntos($id_quiniela["id"], $_POST["id_encuentro_" . $i], $_POST["opc_sel_" . $i]);
                        if ($add_puntos == "OkInsertado") {
                            $cont++;
                        }
                    }
                    //return ["Listo",$total_encuentros,$cont];
                    if ($cont == $total_encuentros) {
                        return "Listo";
                    }
                }
            }
        }
    }
}