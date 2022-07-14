<?php


?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 id ="text_title">Quinielas Vigentes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a>Inicio</a></li>
                        <li class="breadcrumb-item active">Quinielas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content cambiarQuinielas">
        <div class="container-fluid">
            <!------------------------------------------------------------------------------------->
            <div class="card card-warning card-outline">
                    <?php
                    include("card_quinielas.php");
                    ?>
            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
        <script src="js/mostrarQuinielas.js"></script>
    </section>
</div>

