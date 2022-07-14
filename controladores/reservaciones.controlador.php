<?php

class ControladorReservaciones
{

    static public function CrearReservacion()
    {
        if (isset($_POST["nombre"])) {

            $tabla = "reservaciones";
            $datos = array(
                "nombre" => $_POST["nombre"],
                "a_paterno" => $_POST["a_paterno"],
                "a_materno" => $_POST["a_materno"],
                "n_telefono" => $_POST["n_telefono"],
                "correo" => $_POST["correo"],
                "fecha_hora" => $_POST["fecha_hora"],
                "c_personas" => $_POST["c_personas"],
            );

            $respuesta = ReservacionesModelo::RegistrarDatos($tabla, $datos);
            return $respuesta;
        }
    }


    static public function TiposComidas()
    {
        $respuesta = ReservacionesModelo::MostrarTiposComidas();
        return $respuesta;
    }

    static public function PlatillosPrecios($id_TiposComida)
    {
        $respuesta = ReservacionesModelo::MostrarPlatillos($id_TiposComida);
        return $respuesta;
    }
}
