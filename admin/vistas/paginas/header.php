 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom" style="background-image: linear-gradient(to top, #c09bf9, #c29ef3, #c4a0ee, #c5a3e8, #c6a6e3);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <h5>EN LINEA <?php echo $_SESSION["usuario"]; ?></h5>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <!-- <i class="fas fa-cog"></i> -->
          <i class="fas fa-chevron-circle-down"></i>
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

       
          <div class="dropdown-divider"></div>
          <a href="<?php echo $ruta;  ?>cerrar" class="dropdown-item">
            <i class="fas fa-door-open"></i>Salir
          </a>
         

        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->