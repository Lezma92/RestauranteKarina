<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Status</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "../../controlador/jornadas.controlador.php";
        require_once "../../modelos/jornadas.modelo.php";
        if (!isset($_SESSION["id_liga"])) {
            session_start();
        }
        $vistaJornadas = ControladorJornadas::ctrSelectJornadas($_SESSION["id_liga"]);
        $fila = 1;
        foreach ($vistaJornadas as $key => $value) {
        ?>
        <tr>
            <td><?php echo ($fila++); ?></td>
            <td><?php echo ($value["nombre"]); ?></td>
            <td>
                <?php
                    if ($value["estado"] != 'D') {

                        echo '<button class="btn btn-success btn-xs btnActivar" id="misael" id_jornada="' . $value["id"] . '" estadoUsuario="0">Activado</button>';
                    } else {

                        echo '<button class="btn btn-danger btn-xs btnActivar" id_jornada="' . $value["id"] . '" estadoUsuario="1">Desactivado</button>';
                    }
                    ?>
            </td>

            <td>

                <div class="btn-group">
                    <button class="btn btn-warning" onclick="contenedor_encuentros(<?php echo ($value["id"]); ?>)"
                        data-toggle="modal" data-target="#"><i class="fas fa-edit">Agregar Encuentro</i>
                    </button>
                    <button class="btn btn-danger btnEliminarUsuario" idUsuario="" fotoUsuario="" usuario=""><i
                            class="fas fa-trash-alt"></i>
                    </button>
                </div>

            </td>
        </tr>
        <?php } ?>


    </tbody>

</table>