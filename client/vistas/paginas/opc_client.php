<?php 
echo '<li class="nav-item">
<a href="';echo $ruta; echo 'inicio" class="nav-link">
    <i class="fas fa-home text-primary"></i> &nbsp
    <p>Inicio</p>
</a>
</li>';

echo '<li class="nav-item">';
echo '<a href="'.$ruta.'quinielas" class="nav-link">';
echo '<i class="far fa-address-card text-danger"></i> 
  </i> &nbsp
  <p>
    Quinielas
  </p>
</a>
</li>';
echo '<li class="nav-item">
    <a href="';echo $ruta; echo 'misquinielas" class="nav-link">
        <i class="far fa-list-alt text-info"></i> &nbsp
        <p>Mis Quinielas</p>
    </a>
</li>';

?>
