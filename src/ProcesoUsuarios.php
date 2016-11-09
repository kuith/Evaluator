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
	
	//Procesar eliminar usuario por nombre
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
	
	//Procesar eliminar usuario por id
	if ( !empty($_GET["idUsuarioEliminar"])){
		$id = $_GET["idUsuarioEliminar"];
		$UsuarioDb = UsuarioDb::getInstance();
		
		$UsuarioDb->eliminarUsuarioPorId($id);
		header("Location:gestionUsuarios.php");
		//header('Location:pruebas.php?id='.$id);

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
	
	//Procsar actualizar usuario
	if(!empty($_POST["idUsuarioActualizar"])){
		$idUsuario = $_POST["idUsuarioActualizar"];
		$nuevoMombre = $_POST["nombreUsuarioActualizar"];
		$nuevoPassword = $_POST["passwordUsuarioActualizar"];
		$nuevoRol = $_POST["rolUsuarioActualizar"];
		
		$UsuarioDb = UsuarioDb::getInstance();
		
	}
	

    //TODO: preguntar si esto va con las comillas y los puntos o no--->$coincidencias = $UsuarioDb->buscarUsuarioPorNombreOPassword("'".$nombreUsuario."'", "'".$password."'");
	//TODO: no permitir campos vacíos ni contraseñas mayodes que 10 caracteres.
	//TODO: mostrar ventanas de confirmacion antes de eliminar usuarios.
	
         