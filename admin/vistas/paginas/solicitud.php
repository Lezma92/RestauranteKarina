<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de solicitudes en espera</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a>Inicio</a></li>
                        <li class="breadcrumb-item">Solicitudes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!------------------------------------------------------------------------------------->
            <div class="card card-success card-outline">
                <div class="card-body pad table-responsive">
                    <table id="example1" class="table table-bordered table-striped tablas">
                        <thead class="text-success">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php



                            $usuarios = ControladorUsuarios2::ctrlMostrarUsuarios("tipo_usuario", "Cliente", "Espera");

                            foreach ($usuarios as $key => $value) {

                                echo ('<tr><td>' . ($key + 1) . '</td>');
                                echo ('<td>' . $value["nombre"] . ' ' . $value["app_s"] . '</td>');
                                echo ('<td>' . $value["usuario"] . '</td>');
                                echo '<td>' . $value["tel"] . '</td>';
                                echo '<td> 
                                <div class="btn-group">
                                <button class="btn btn-success btn-xs aceptar" idUsuario="' . $value["id"] . '" estadoUsuario="Activo">Aceptar</button>
                                <button type="button" class="btn btn-danger btnEliminarUsuario" estoyEn = "2"  idUsuario="' . $value["id"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"> Rechazar</i></button>
                                </div> </td></tr>';
                            }


                            ?>

                        </tbody>

                    </table>

                </div>
            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
    </section>
</div>
<script>
    $(".tablas").on("click", ".btnEliminarUsuario", function() {

        var idUsuario = $(this).attr("idUsuario");
        var estoy = $(this).attr("estoyEn");
        console.log(idUsuario);
        var datos = new FormData();
        datos.append("idUsuarioE", idUsuario);
        console.log("oohhsiii");
        Swal.fire({
            title: '¿Desea eliminar este usuario?',
            text: "¡Si no lo está puede cancelar la accíón!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar usuario!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../ajax/usuarios.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        console.log(respuesta);

                        if (respuesta == "ok") {

                            Swal.fire({

                                type: "success",
                                icon: 'success',
                                title: "¡El usuario ha sido eliminado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result) {

                                if (result.value) {
                                    location.reload();
                                }
                                location.reload();
                            });
                        }

                    }
                });
            }
        })
    })
</script>
<script>
    $(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
        });
    });
</script>