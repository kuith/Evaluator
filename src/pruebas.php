 <?php
    require "UsuarioDb.php";
        
//    $numero = $_GET["numero"];
//	$nombreUsuario = $_GET["nombreUsuario"];
//	$password = $_GET["password"];
//	        
//        print '<h1>usuario: </h1>';
//        print $nombreUsuario;
//        
//        print '<h1>contraseña: </h1>';
//        print $password;
//        
//        print '<h1>numero: </h1>';
//        print $numero;
// 
	$nombre = $_GET["nombreUsuario"];
	$password = $_GET["password"];
	

	print '<h1>nombre: </h1>';
	print $nombre;
	
	print '<h1>contraseña: </h1>';
	print $password;

	
	
	
//	<!--			<div class="col-sm-5 ">
//			    <form class="form-inline" method="POST" action="ProcesoUsuarios.php">
//					<div class="form-group">
//						<label for="nombre_eliminar_usuario">Nombre:</label>
//						<input type="text" class="form-control" name = "nombre_eliminar_usuario" id="">
//					</div>
//					<button type="submit" class="btn btn-primary">Eliminar</button>
//                </form>
//			</div>-->