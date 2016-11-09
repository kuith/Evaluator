<?php
//TODO: pregunta existencial. Si un archico es sobre todo html pero lleva incrustado php ¿La extension deberia ser html o php?
//TODO:hacer que todos los botones ocupen lo mismo
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Evaluator v.1.0 - Control de usuarios</title>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	<link href="../css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
	<div class="container">
        <div class="row" id = "encabezadoControlUsuarios">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
                    <h1> <span class="tag tag-primary">Control de usuarios</span></h1>
			</div>
			<div class="col-sm-4"></div>
		</div>
        <div class="row filaBotonesGestionUsuarios">
			<div class="col-sm-5 "><button type="button" data-toggle="modal" data-target="#modal_nuevo_usuario" class="btn btn-success btn-block">Añadir usaurio</button></div>
			<div class="col-sm-2 "></div>
			<div class="col-sm-5 ">
				<form class="form-inline" method="POST" action="ProcesoUsuarios.php">
					<div class="form-group">
						<label for="nombre_buscar_usuario">Nombre:</label>
						<input type="text" class="form-control" name="nombre_buscar_usuario">
					</div>
					<button type="submit" class="btn btn-primary">Buscar</button>
				</form>
			</div>
		</div>
		<div class="row filaBotonesGestionUsuarios">
			<div class="col-sm-5 "><button type="button" class="btn btn-success btn-block">Listar usuarios</button></div>
			<div class="col-sm-2 "></div>
			<div class="col-sm-5 "><button type="button" class="btn btn-success btn-block">Gesti&oacute;n de roles</button></div>
		</div>
		<div class="row filaBotonesGestionUsuarios">
			<div class="col-sm-2 "><a href="../index.php" class="btn btn-secondary btn-block " role="button" aria-pressed="true">Volver</a></div>
		</div>
			
		<!--Modal prompt nuevo usuario-->
		<?php require 'modal/modalNuevoUsuario.php' ?> 
		<!--Fin modal prompt nuevo usuario-->
		
		<!--Modal prompt eliminar usuario-->
		<?php require 'modal/modalEliminarUsuario.php' ?>
		<!--Fin modal prompt eliminar usuario-->
			
	</div>

		<!-- jQuery first, then Tether, then Bootstrap JS. -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
	</body>
</html>
<!--//TODO: filtrar la introduccion de datos, no permitir vacíos, etc.-->