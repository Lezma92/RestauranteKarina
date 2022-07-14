<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
  <!-- Brand Logo -->

  <a href="<?php echo $ruta;  ?>inicio" class="brand-link">
    <img src="img/icono.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Quinielas Radilla</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column sticky-top" data-widget="treeview" role="menu" data-accordion="false">
        <?php

        if ($_SESSION["perfil"] == "Cliente") {
          include("opc_client.php");
        }


        ?>





      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>