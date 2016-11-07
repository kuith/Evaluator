 <?php
    require "UsuarioDb.php";
        
        $numero = $_GET["numero"];
	$nombreUsuario = $_GET["nombreUsuario"];
	$password = $_GET["password"];
	        
        print '<h1>usuario: </h1>';
        print $nombreUsuario;
        
        print '<h1>contraseña: </h1>';
        print $password;
        
        print '<h1>numero: </h1>';
        print $numero;
 
 

	
	
	

