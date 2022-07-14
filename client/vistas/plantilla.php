<?php

session_start();
$ruta = ControladorRutaa::ctrRuta();

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Principal</title>

	<base href="vistas/">

	<link rel="icon" href="img/icono.png">

	<!--=====================================
	VÍNCULOS CSS
	======================================-->

	<!-- Fuente Open Sans y Ubuntu -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Ubuntu" rel="stylesheet">


	<!--=====================================
	VÍNCULOS CSS ADMIN LTE 3.0
	======================================-->
	<link rel="stylesheet" href="css/estilo.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../admin/vistas/plugins/fontawesome-free/css/all.min.css">


	<!-- Theme style -->
	<link rel="stylesheet" href="../../admin/vistas/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="../../admin/vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- DataTables -->
	<link rel="stylesheet" href="../../admin/vistas/plugins/datatables/dataTables.bootstrap4.css">

	<!-- jQuery -->
	<script src="../../admin/vistas/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<!-- <script src="plugins/jquery-ui/jquery-ui.min.js"></script> -->
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<!-- <script>
	  $.widget.bridge('uibutton', $.ui.button)
	</script> -->
	<!-- Bootstrap 4 -->
	<script src="../../admin/vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	
	<script src="dist/js/pages/dashboard.js"></script>
	<!-- DataTables -->
	<script src="../../admin/vistas/plugins/datatables/jquery.dataTables.js"></script>
	<script src="../../admin/vistas/plugins/datatables/dataTables.bootstrap4.min.css"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.js"></script>
	<!-- <script src="plugins/sweetalert2/sweetalert2.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
	<div class="wrapper">


		<?php

		if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
			echo '<div class="wrapper">';
			//===============================================================
			if (!isset($_SESSION['tiempo'])) {
				$_SESSION['tiempo'] = time();
			} else if (time() - $_SESSION['tiempo'] > 1000) {
				session_destroy();
				/* Aquí redireccionas a la url especifica */
				// echo '<script>window.location = "http://localhost/quinielas/login";</script>';
				echo '<script>window.location = "https://prigol.miniprogol.com/login;</script>';
				die();
			}
			$_SESSION['tiempo'] = time(); //Si hay actividad seteamos el valor al tiempo actual

			//============================================================ 

			include "paginas/header.php";
			include "paginas/menu.php";



			// include "paginas/cuerpo.php";

			if (isset($_GET["pagina"])) {

				if (
					$_GET["pagina"] == "inicio" ||
					$_GET["pagina"] == "jugar" ||
					$_GET["pagina"] == "quinielas" ||
					$_GET["pagina"] == "cerrar"||
					$_GET["pagina"] == "misquinielas"
				) {

					include "paginas/" . $_GET["pagina"] . ".php";
				}else {
					include "paginas/404.php";
				}
			} else{

				include "paginas/inicio.php";
			
			}



			include "paginas/footer.php";

			echo '</div>';
		} else {

			// echo '<script>window.location = "http://localhost/quinielas/login;</script>';
			echo '<script>window.location = "https://prigol.miniprogol.com/login;</script>';
		}
		?>
		<!-- window.location = "http://localhost/quinielas/login"; -->
		<!-- dir local -->
		<script>
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false,
				});
			});
		</script>
		<!-- <script src="js/usuarios.js"></script> -->


</body>

</html>