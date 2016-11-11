<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Evaluator v.1.0 - inicio</title>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
		<link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
		<div class="container">
			<div class="row" id = "encabezadoControlUsuarios">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
						<h1> <span class="tag tag-primary">Acceso al sitio</span></h1>
				</div>
				<div class="col-sm-4"></div>
			</div>
			<form class="form" method="GET" action="src/ProcesoAcceso.php">
				<div class="form-group row">
					<label for="accesoUsuario" class="offset-sm-2 col-sm-2 col-form-label">Usuario</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" name = "accesoUsuario" id="accesoUsuario" placeholder="Usuario">
				</div>
				</div>
				<div class="form-group row">
					<label for="accesoPassword" class="offset-sm-2 col-sm-2 col-form-label">Contraseña</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" name = "accesoPassword" id="accesoPassword" placeholder="Contraseña">
					</div>
				</div>
				<div class="form-group row">
					<div class="offset-sm-2 col-sm-10">
						<button type="submit" class="btn btn-primary">identificarse</button>
					</div>
				</div>
			  </form>
			</div>
		</div>

		<!-- jQuery first, then Tether, then Bootstrap JS. -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
	</body>
</html>
<!--//TODO: filtrar la introduccion de datos, no permitir vacíos, etc.-->
<!--//TODO: centrar todo-->