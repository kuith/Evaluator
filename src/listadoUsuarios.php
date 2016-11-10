<?php
	require "UsuarioDb.php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  </head>
  <body>
	  <div class ="container">
		<div class="row" id = "encabezadoListadoUsuarios">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<h1> <span class="tag tag-primary">Listado  de Usuarios</span></h1>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div id="gridCursos" class="center-block">
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>id</th>
						<th>Nombre</th>
						<th>Contrase&ntilde;a</th>
						<th>Rol</th>
					</tr>
				</thead>
				<tbody>
					<?php require '../plantillas/usuarios/TrGridUsuarios.php' ?>
				</tbody>
			</table>
		</div>
		  <div class="row">
			  <div class="col-sm-10 "></div>
			  <div class="col-sm-2 "><a href="gestionUsuarios.php" class="btn btn-secondary btn-block " role="button" aria-pressed="true">Volver</a></div>
		  </div>
	  </div>
    
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  </body>
</html>