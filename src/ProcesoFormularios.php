<?php
	require "CursoDb.php";
	require "ParcialDb.php";
	require "AlumnoDb.php";

	if ( !empty($_POST["nombre_curso"])){

		$nombreCurso = $_POST["nombre_curso"];
		
		//echo("tengo el nombre del curso: " . $nombreCurso . ". Y el numero de alumnos: " . $numero_alumnos);
		$CursoDb = CursoDb::getInstance();
		$CursoDb -> nuevo($nombreCurso);

		header("Location:..\index.php");

	}
	
	//procesar borrar curso
	if ( !empty($_POST["borrarCurso"]) ){
		$idCursoABorrar = $_POST["borrarCurso"];

		$CursoDb = CursoDb::getInstance();
		$CursoDb -> eliminar($idCursoABorrar);
		header("Location:..\index.php");
	}
	
	//procesar nuevo parcial
	if ( !empty($_POST["form_nuevo_parcial"]) ){

		$idCurso = $_POST["form_nuevo_parcial"];
		$nombre = $_POST["nombre_parcial"];
		$peso = $_POST["peso_parcial"];

		$ParcialDb = ParcialDb::getInstance();
		
		$pesoAcumuladoObj = $ParcialDb->obtenerPesoTotalParcialesCurso($idCurso);
		$pesoAcumulado = mysqli_fetch_assoc($pesoAcumuladoObj);
		$pesoAcumuladoResult = (int)$pesoAcumulado["pesoTotal"];
		$pesoTotal = $pesoAcumuladoResult + (int)$peso;
		
		if($pesoTotal <= 100){
			$ParcialDb -> nuevo($nombre, $idCurso, $peso);
			header("Location:../index.php?idCurso='".$idCurso.'"');
		} else {
			header("Location:avisos/pesoExcedido.php?pesoTotalAcumulado='".$pesoTotal."'& idCurso='".$idCurso."'");

		}		
	}
	
	//procesar eliminar parcial
	if ( !empty($_POST["form_eliminar_parcial"]) ){
		$idCurso = $_POST["form_eliminar_parcial"];
		$nombre = $_POST["nombre_parcial"];
		
		$ParcialDb = parcialDb::getInstance();
		$ParcialesCurso =  $ParcialDb->obtenerParcialPorNombreYCurso($idCurso, $nombre);
		//$ParcialesRow = $ParcialesCurso -> fetch_object();
		$numeroParcialesEncontrados = $ParcialesCurso -> num_rows;
	
		if($numeroParcialesEncontrados == 0){
			//header("Location:pruebas.php?numeroParcialesEncontrados='".$numeroParcialesEncontrados."'");
			//header("Location:avisos/parcialParaEliminarNoEncontrado.php.);
			header("Location:avisos/parcialParaEliminarNoEncontrado.php?numeroParcialesEncontrados='".$numeroParcialesEncontrados."'");
		} else {
			$ParcialDb -> elimiarParcialPorNombreYCurso($idCurso, $nombre);
			header("Location:../index.php?idCurso='".$idCurso.'"');
		}
	}
	
	//procesar nuevo alumno
	if ( !empty($_POST["form_nuevo_alumno"]) ){

		$idCurso = $_POST["form_nuevo_alumno"];
		$nombre = $_POST["nombre_alumno"];
		
		$AlumnoDb = AlumnoDb::getInstance();
		$AlumnoDb -> nuevo($nombre, $idCurso);

		header("Location:../index.php?idCurso='".$idCurso.'"');


	}
//TODO: hacer que al dar de alta nuevo curso, vuelva a la misma página "curso.php".






