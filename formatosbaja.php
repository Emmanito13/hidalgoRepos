<?php
include 'lib/lib.php'
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style_formatos_baja.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Baja de personal</title>
	<link rel="shortcut icon" href="pictures/logoAba.png" type="image/x-icon">
</head>

<body BGCOLOR=#CCC>

	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="fw-bold container-header py-5" style="text-align:center; color: #203C6C;">
				<h1 style="font-size: 50px; color:#000"><input type="image" src="pictures/baja.png" width="3.3%" height="auto" tabindex="-1">Bajas</h1>
			</div>
		</div>
		<div class="container-fluid">
			<input type="image" src="pictures/atras.png" alt="Submit" title="Volver" width="30" height="30" onclick=" location ='indexMenu.php'">
			<div class="container-fluid" id="tabla"></div>
		</div>
		<div class="row justify-content-center">
			<div class=" col">
				<div class="card">
					<div class="card-header" id="ch-w" style="background: rgb(208,101,3);">
						<h4>Busqueda</h4>
					</div>
					<a href="busquedabaja.php">
						<img src="pictures/buscar.png" style="text-align: center;" width="110" height="auto">
					</a>
				</div>
			</div>

			<div class="col">
				<div class="card">
					<div class="card-header" id="ch-w" style="background: rgb(233,147,26);">
						<h4>Dar de baja un empleado</h4>
					</div>
					<a href="buscabaja.php">
						<img src="pictures/emple-baja.png" style="text-align: center;" width="110" height="auto">
					</a>
				</div>
			</div>

			<div class="col">
				<div class="card">
					<div class="card-header" id="ch-w" style="background: rgb(22,107,162);">
						<h4>Contratos Temporales</h4>
					</div>
					<a href="contratos.php">
						<img src="pictures/formato.png" style="text-align: center;" width="110" height="auto">
					</a>
				</div>
			</div>

		</div>
	</div>

</body>

</html>