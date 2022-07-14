<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4 sidebar-no-expand" style="background-image: linear-gradient(to top, #c09bf9, #c29ef3, #c4a0ee, #c5a3e8, #c6a6e3);">
  <!-- Brand Logo -->

  <a href="<?php echo $ruta;  ?>inicio" class="brand-link">
    <img src="img/icono.png" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><strong>Restaurante Karina</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column sticky-top" data-widget="treeview" role="menu" data-accordion="false">
        <?php

        if ($_SESSION["tipo_usuario"] == "Administrador" || $_SESSION["tipo_usuario"] == "Soporte_ti") {
          include("opc_admin.php");
        } else {
          echo ($ruta . "cerrar");
        }

        ?>





      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>