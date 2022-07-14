<?php
class ControladorResultados
{
    static public function ctrVerLigasJornadas()
    {
        $respuesta = ModeloResultados::mdlMostrarLigarJornadas();

        return $respuesta;
    }
    static public function ctrVerResultados($id_liga, $id_jornada)
    {
        $respuesta = ModeloResultados::mdlMostrarResultados($id_liga, $id_jornada);
        return $respuesta;
    }
    static public function ctrVerMisQuinielas($id_usuario, $id_jornada = "SinDatos")
    {
        if ($id_jornada == "SinDatos") {
            $respuesta = ModeloResultados::mdlMisQuinielas($id_usuario);
            return $respuesta;
        }else{
            $respuesta = ModeloResultados::mdlQuinielasxJornada($id_usuario,$id_jornada);
            return $respuesta;
        }
    }
    static public function crtVerJuego($idQuiniela){
        $respuesta = ModeloResultados::mdlVerJuego($idQuiniela);
        return $respuesta;
    }
    static public function crtMostrarPremios($id_jornada)
    {
        $respuesta = ModeloResultados::mdlVerPremios($id_jornada);
        return $respuesta;
    }
    static public function crtListarEncuentros($id_jornada){
        $respuesta = ModeloResultados::mdlgetEncuentros($id_jornada);
        return $respuesta;
    }
}

