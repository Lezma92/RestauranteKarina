<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Platillo</th>
            <th>Precio c/u</th>
            <th>Preco x paquete</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "../../controlador/jornadas.controlador.php";
        require_once "../../modelos/jornadas.modelo.php";
        if (!isset($_SESSION["id_categoria"])) {
            session_start();
        }
        $vistaJornadas = ControladorJornadas::ctrListarPlatillos($_SESSION["id_categoria"]);
        $fila = 1;
        foreach ($vistaJornadas as $key => $value) {

        ?>
            <tr>
                <td><?php echo ($fila++); ?></td>

                <td>
                    <img width="120px" height="120px" src="<?php echo ("../../img_platillos/" . $value["url_img"]); ?>" alt="<?php echo ($platillo["nombrePlatillo"]); ?>" srcset="">

                </td>
                <td><?php echo ($value["nombrePlatillo"]); ?></td>
                <td><?php echo ($value["precio_unitario"]); ?></td>
                <td><?php echo ($value["precio_paquete"]); ?></td>
                <td><?php echo ($value["descripcion"]); ?></td>
                <td>
                    <div class="btn-group">
                        <button id="btn_eliminar" onclick="EliminarPlatillo(<?php echo ($value['id']); ?>,'<?php echo ($value['nombrePlatillo']); ?>')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"> <i class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
            </tr>
        <?php } ?>


    </tbody>


</table>