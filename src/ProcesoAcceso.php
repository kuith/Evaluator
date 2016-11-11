<?php
	require "UsuarioDb.php";
	
	if ( !empty($_GET["accesoUsuario"])){
		$intentoUsuario = $_GET["accesoUsuario"];
		$intentoPassword = $_GET["accesoPassword"];
		
		$UsuarioDb = UsuarioDb::getInstance();
		$coincidencias = $UsuarioDb->buscarUsuarioPorNombreOPassword("'".$intentoUsuario."'","'".$intentoPassword."'");
		$numConcidencias = (int)$coincidencias -> num_rows;
		
		if($numConcidencias === 0){
			//header("Location:avisos/usuarioNoAutorizado.php");
			header('Location:../src/pruebas.php?nombreUsuario='.$intentoUsuario. "& password=" .$intentoPassword);
		} else {
			header("Location:index.php");
		}
				
				
	}


