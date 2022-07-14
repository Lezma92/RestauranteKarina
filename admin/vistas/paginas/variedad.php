  <?php
    session_start();
    $id_categoria = $_GET["id_categoria"];
    $_SESSION["id_categoria"] = $id_categoria;
    require_once "../../controlador/jornadas.controlador.php";
    require_once "../../modelos/jornadas.modelo.php";
    ?>

  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col">
                      <h1>Listas de Platillos</h1>
                  </div>
                  <div class="col-sm-5">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a>Inicio</a></li>
                          <li class="breadcrumb-item"><a>Categorias</a></li>
                          <li class="breadcrumb-item active">Platillos</li>
                      </ol>
                  </div>
              </div>
          </div>
      </section>

      <section class="content">
          <div class="container-fluid">
              <!------------------------------------------------------------------------------------->
              <div class="card card-primary card-outline">
                  <div class="card-header">
                      <div class="col-sm-2 border-bottom-1">
                          <button type="button" onclick="setIdPlatillo(<?php echo ($id_categoria); ?>)" class="btn btn-block bg-danger" data-toggle="modal" data-target="#modalAddPlatillos">Agregar Platillo</button>
                      </div>


                  </div>

                  <div class="card-body pad table-responsive" id="tabla_jornadas">

                      <?php
                        include("tabla_jornadas.php");
                        ?>
                  </div>

              </div>
              <!-- ------------------------------------------------------------------------------- -->
          </div>
      </section>
  </div>

  <?php

    include "modales/modal_addplatillos.php";
    ?>
  <script src="js/regist_platillos.js"></script>
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