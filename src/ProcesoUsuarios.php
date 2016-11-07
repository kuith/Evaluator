<?php
    require "UsuarioDb.php";

    //Procesar nuevo usuario
    if ( !empty($_POST["nombre_nuevo_usuario"])){
	$nombreUsuario = $_POST["nombre_nuevo_usuario"];
	$password = $_POST["password_nuevo_usuario"];
	$rol = $_POST["rol_nuevo_usuario"];
		
	$UsuarioDb = UsuarioDb::getInstance();
	$coincidencias = $UsuarioDb->buscarUsuarioPorNombreOPassword($nombreUsuario,$password);
	$numConcidencias = (int)$coincidencias -> num_rows;
        
	if($numConcidencias != 0){
            //header("Location:avisos/usuarioNoValido.php");
            header('Location:../src/pruebas.php?numero='.$numConcidencias."& nombreUsuario=" .$nombreUsuario. "& password=" .$password);
        } else {
            //$UsuarioDb -> nuevo($nombreUsuario, $password, $rol);
            //header("Location:../src/gestionUsuarios.php");
            //header('Location:../src/pruebas.php?numero='.$numeroUsuariosEncontrados."& nombreUsuario=" .$nombreUsuario. "& password=" .$password);
            }
	}
	
	//Procesar eliminar usuario
	if ( !empty($_POST["nombre_eliminar_usuario"])){
            $nombreUsuario = $_POST["nombre_eliminar_usuario"];
		
            $UsuarioDb = UsuarioDb::getInstance();
            $coincidencias = $UsuarioDb->buscarUsuarioPorNombre($nombreUsuario);
            $numConcidencias = (int)$coincidencias -> num_rows;
		
            if($numConcidencias === 0){
		header("Location:avisos/usuarioParaEliminarNoEncontrado.php");
		//header('Location:../src/pruebas.php?nombre=' .$nombreUsuario);
            } else {
		$UsuarioDb -> eliminarPorNombre("'".$nombreUsuario."'");
		header("Location:../src/gestionUsuarios.php");
		//header('Location:../src/pruebas.php?nombre=' .$nombreUsuario.'"');
            }
	}
	
	//Proesar buscar usuario
	if(!empty($_POST["nombre_buscar_usuario"])){
		
	}

        //TODO: preguntar si esto va con las comillas y los puntos o no--->$coincidencias = $UsuarioDb->buscarUsuarioPorNombreOPassword("'".$nombreUsuario."'", "'".$password."'");
        