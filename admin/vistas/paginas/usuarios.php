<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administradores del Sistema</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a>Inicio</a></li>
              <li class="breadcrumb-item active">Usuario</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
              
    <section class="content">
      <div class="container-fluid">
    <!------------------------------------------------------------------------------------->
        <div class="card card-warning card-outline">
            <div class="card-header">
              <div class="col-sm-2">
                <button type="button" onclick="estoyEnModal('usuarios')" class="btn btn-block" id="color_ofi" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
              </div>
            </div>

            
            <div class="card-body pad table-responsive">
              <table id="example1" class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Teléfono</th>
                  <th>Ultima Conexión</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

             <?php

               

              $usuarios =ControladorUsuarios2::ctrlMostrarUsuarios();
               foreach ($usuarios as $key => $value){
                 
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].' '.$value["apellidos"].'</td>
                          <td>'.$value["alias"].'</td>';

                          
                          echo '<td>'.$value["telefono"].'</td>';
                          echo '<td>'.$value["ult_conexion"].'</td>
                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditarUsuario" onclick="estoyEnModalEditar(1)" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button>

                              <button class="btn btn-danger btnEliminarUsuario" estoyEn = "1" idUsuario="'.$value["id"].'" usuario="'.$value["alias"].'"><i class="fa fa-times"></i></button>

                            </div>  

                          </td>

                        </tr>';
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

<?php 

include "modales/modal_usuarios.php";
 ?>
<script src="js/usuarios.js"></script>
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