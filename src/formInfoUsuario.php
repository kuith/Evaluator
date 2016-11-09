<?php
	require "UsuarioDb.php";
	
	$idActual = (int)$_GET['id'];
	$nombreActual = $_GET["nombre"];
	$passwordActual = $_GET["password"];
	$rolActual = $_GET["rol"];
	
//	print '<p> id: ' .$idActual. '</p>';
//	print '<p> nombre: ' .$nombreActual. '</p>';
//	print '<p> password: ' .$passwordActual. '</p>';
//	print '<p> rol: ' .$rolActual. '</p>';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Evaluator v.1.0</title>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link href="../css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
		<div class ="container center">
			<h3>Usuario: <?php print $nombreActual?></h3>
			<form  method="POST" action="ProcesoUsuarios.php">
				<input type="hidden" name="idUsuarioActualizar" value="<?php print $idActual?>">
				<div class="form-group row">
					<div class="col-sm-6">
						<label for="nombre">Nombre:</label>
						<input type="text" class="form-control" name ="nombreUsuarioActualizar" id="nombre" value="<?php print $nombreActual?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-6">
						<label for="password">Contraseña:</label>
						<input type="text" class="form-control" name ="passwordUsuarioActualizar" id="password" value="<?php print $passwordActual?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-6">
						<label for="rol">Rol:</label>
						<input type="text" class="form-control" name ="rolUsuarioActualizar" id="rol" value="<?php print $rolActual?>">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-success" >Aplicar Cambios</button>
						<a href="ProcesoUsuarios.php?idUsuarioEliminar=<?php print $idActual?>" class="btn btn-danger" role="button" aria-pressed="true">Eliminar Usuario</a>
						<a href="gestionUsuarios.php" class="btn btn-secondary" role="button" aria-pressed="true">Volver</a>
					</div>
				</div>
			</form>
		</div>
        <!-- jQuery first, then Bootstrap JS. -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
        <script src="js/util.js"></script>
  </body>
</body>