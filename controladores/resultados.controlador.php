<?php
class ControladorResultados
{
    static public function TiposComidas()
    {
        $respuesta = ModeloResultados::MostrarTiposComidas();
        return $respuesta;
    }
}