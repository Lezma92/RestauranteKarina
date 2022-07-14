 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <h5>Conectado <?php echo $_SESSION["nombre"]; ?></h5>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <!-- <i class="fas fa-cog"></i> -->
          <i class="fas fa-chevron-circle-down"></i>
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>
          <a href="<?php echo $ruta;  ?>cerrar" class="dropdown-item">
            <i class="fas fa-door-open"></i>Cerrar Sesión
          </a>
         

        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->