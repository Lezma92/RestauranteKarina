<?php 

if($_SESSION["perfil"] == "Vendedor"){
  echo '<script>
    window.location = "../inicio";
  </script>';

  return;
}

 ?>

<!--  -->
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar Propiedad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a>Inicio</a></li>
              <li class="breadcrumb-item active">Agregar Propiedad</li>
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
                <button type="button" class="btn btn-block" id="color_ofi" data-toggle="modal" data-target="#modalAgregarPropiedad">Agregar Propiedad</button>
              </div>
            </div>
            <div class="card-body pad table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Ultima Conexión</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                  <td>1</td>
                  <td>Celestino Arroyo Mata</td>
                  <td>Celes</td>
                  <td>Administrador</td>
                  <td>Activo</td>
                  <td>2020-08-24 13:55:07</td>
                  <?php 
                  echo '<td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="" data-toggle="modal" data-target="#"><i class="fas fa-edit"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="" fotoUsuario="" usuario=""><i class="fas fa-trash-alt"></i></button>

                    </div>  

                  </td>';

                   ?>
                </tr>

                <tr>
                  <td>1</td>
                  <td>Juan Perez</td>
                  <td>Perez</td>
                  <td>Editor</td>
                  <td>Activo</td>
                  <td>2020-08-24 16:12:20</td>
                  <?php 
                  echo '<td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="" data-toggle="modal" data-target="#"><i class="fas fa-edit"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="" fotoUsuario="" usuario=""><i class="fas fa-trash-alt"></i></button>

                    </div>  

                  </td>';

                   ?>
                </tr>
                
                </tbody>
                
              </table>

            </div>
          </div>
    <!-- ------------------------------------------------------------------------------- -->
      </div>
    </section>
</div>

<?php 

include "modales/modal_subir.php";
include "modales/modal.php";
 ?>