<?php
    require "UsuarioDb.php";

    //Procesar nuevo usuario
    if ( !empty($_POST["nombre_nuevo_usuario"])){
		$nombreUsuario = $_POST["nombre_nuevo_usuario"];
		$password = $_POST["password_nuevo_usuario"];
		$rol = $_POST["rol_nuevo_usuario"];

		$UsuarioDb = UsuarioDb::getInstance();
		$coincidencias = $UsuarioDb->buscarUsuarioPorNombreOPassword("'".$nombreUsuario."'","'".$password."'");
		$numConcidencias = (int)$coincidencias -> num_rows;

		if($numConcidencias != 0){
				header("Location:avisos/usuarioNoValido.php");
			} else {
				$UsuarioDb -> nuevo($nombreUsuario, $password, $rol);
				header("Location:../src/gestionUsuarios.php");
				//header('Location:../src/pruebas.php?numero='.$numeroUsuariosEncontrados."& nombreUsuario=" .$nombreUsuario. "& password=" .$password);
			}
	}
	
	//Procesar eliminar usuario
	if ( !empty($_POST["nombre_eliminar_usuario"])){
        $nombreUsuario = $_POST["nombre_eliminar_usuario"];
		
        $UsuarioDb = UsuarioDb::getInstance();
        $coincidencias = $UsuarioDb->buscarUsuarioPorNombre("'".$nombreUsuario."'");
        $numConcidencias = (int)$coincidencias -> num_rows;
		
        if($numConcidencias === 0){
			header("Location:avisos/usuarioParaEliminarNoEncontrado.php");
		} else {
			$UsuarioDb -> eliminarPorNombre("'".$nombreUsuario."'");
			header("Location:../src/gestionUsuarios.php");
		}
	}
	
	//Proesar buscar usuario
	if(!empty($_POST["nombre_buscar_usuario"])){
		$nombreUsuario = $_POST["nombre_buscar_usuario"];
		
        $UsuarioDb = UsuarioDb::getInstance();
        $coincidencias = $UsuarioDb->buscarUsuarioPorNombre("'".$nombreUsuario."'");
        $numConcidencias = (int)$coincidencias -> num_rows;
		
        if($numConcidencias === 0){
			header("Location:avisos/usuarioNoEncontrado.php");
		} else {
			$rowUsuario = $coincidencias->fetch_object();
			$idUsuarioObtenido = $rowUsuario->id;
			$nombreUsuarioObtenido = $rowUsuario->nombre;
			$passwordUsuarioObtenido = $rowUsuario->password;
			$rolUsuarioObtenido = $rowUsuario->rol;
			
			header("Location:formInfoUsuario.php?id=" .$idUsuarioObtenido. "& nombre=" .$nombreUsuarioObtenido. "& password=" .$passwordUsuarioObtenido. "& rol=" .$rolUsuarioObtenido);
			
		}
	}

        //TODO: preguntar si esto va con las comillas y los puntos o no--->$coincidencias = $UsuarioDb->buscarUsuarioPorNombreOPassword("'".$nombreUsuario."'", "'".$password."'");
		//TODO: no permitir campos vacíos ni contraseñas mayodes que 10 caracteres.
         