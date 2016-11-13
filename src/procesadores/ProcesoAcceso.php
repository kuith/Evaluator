<?php
	require "../UsuarioDb.php";
	
	if ( !empty($_POST["accesoUsuario"])){
		$intentoUsuario = $_POST["accesoUsuario"];
		$intentoPassword = $_POST["accesoPassword"];
		
		$UsuarioDb = UsuarioDb::getInstance();
		$coincidencias = $UsuarioDb->buscarUsuarioPorNombreYPassword("'".$intentoUsuario."'","'".$intentoPassword."'");
		$numConcidencias = (int)$coincidencias -> num_rows;
		
		if($numConcidencias === 0){
			header("Location:../avisos/usuarioNoAutorizado.php");
		} else {
			header("Location:../../inicioCursos.php");
		}
				
				
	}
