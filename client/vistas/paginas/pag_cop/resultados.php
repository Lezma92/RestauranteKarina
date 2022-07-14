<section class="content">
    <div class="container-fluid">
        <!------------------------------------------------------------------------------------->
        <div class="card card-warning card-outline">
            <div class="card-header">
                <p class="text-center font-weight-bold" style="font-size: 20px;">
                    Tabla de posiciones y resultados
                </p>
            </div>


            <div class="card-body pad table-responsive">
                <table class="table table-bordered table-striped tablas">
                    <thead class="thead-dark">
                        <tr>
                            <th>Participantes</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>P</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php



                        // $usuarios = ControladorUsuarios2::ctrlMostrarUsuarios(null, null);

                        // foreach ($usuarios as $key => $value) {

                        //     echo ' <tr>
                        //                 <td>' . $value["nombre"] . '</td>
                        //                 <td>' . $value["usuario"] . '</td>';
                        //     echo '<td>' . $value["tipo_usuario"] . '</td>';

                        //     if ($value["estado"] != 0) {

                        //         echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                        //     } else {

                        //         echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                        //     }

                        //     echo '<td>' . $value["ult_conexion"] . '</td>
                        //   <td>

                        //     <div class="btn-group">
                                
                        //       <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button>

                        //       <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>

                        //     </div>  

                        //   </td>

                        // </tr>';
                        // }


                        ?>

                    </tbody>

                </table>

            </div>
        </div>
        <!-- ------------------------------------------------------------------------------- -->
    </div>
</section>