<?php
	require "CursoDb.php";
	require "ParcialDb.php";
	require "AlumnoDb.php";
	
	define("NOMBRE_PARCIAL_FINAL", "Final");
	define("PESO_PARCIAL_FINAL", 0);
	
	//procesar nuevo curso
	if ( !empty($_POST["nombre_nuevo_curso"])){

		$nombreCurso = $_POST["nombre_nuevo_curso"];
		
		$CursoDb = CursoDb::getInstance();
		$CursoDb -> nuevo($nombreCurso);
		
		//Creacion del pacial "Final"
		$cursoParaFinal = $CursoDb -> obtenerIdPorNombre("'".$nombreCurso."'");
		
		$cursoParcialFinal = mysqli_fetch_assoc($cursoParaFinal);
		$idCursoParcialFinal = $cursoParcialFinal["id"];
		$ParcialDb = ParcialDb::getInstance();
		$ParcialDb -> nuevo(NOMBRE_PARCIAL_FINAL,$idCursoParcialFinal, PESO_PARCIAL_FINAL);
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
		//Primero busco si existe el parcial
		$ParcialesCurso =  $ParcialDb->obtenerParcialPorNombreYCurso($idCurso, "'".$nombre."'");
		$numeroParcialesEncontrados = (int)$ParcialesCurso -> num_rows;
		if($numeroParcialesEncontrados === 0){
			//Si no existe miro el peso
			$pesoAcumuladoObj = $ParcialDb-> obtenerPesoTotalParcialesCurso($idCurso);
			$pesoAcumulado = mysqli_fetch_assoc($pesoAcumuladoObj);
			$pesoAcumuladoResult = (int)$pesoAcumulado["pesoTotal"];
			$pesoTotal = $pesoAcumuladoResult + (int)$peso;
			
			//Si el peso es menos de 100 sigo
			if($pesoTotal <= 100){
				$ParcialDb -> nuevo($nombre, $idCurso, $peso);
				header("Location:../index.php?idCurso='".$idCurso.'"');
			} else {
				header("Location:avisos/pesoExcedido.php?pesoTotalAcumulado='".$pesoTotal."'& idCurso='".$idCurso."'");

			}
		} else {
			header("Location:avisos/parcialExistente.php");
		}	
	}
	
	//procesar eliminar parcial
	if ( !empty($_POST["form_eliminar_parcial"]) ){
		$idCurso = $_POST["form_eliminar_parcial"];
		$nombre = $_POST["nombre_parcial"];
		
		$ParcialDb = parcialDb::getInstance();
		$ParcialesCurso =  $ParcialDb->obtenerParcialPorNombreYCurso($idCurso, "'".$nombre."'");
		$numeroParcialesEncontrados = (int)$ParcialesCurso -> num_rows;
		if($numeroParcialesEncontrados === 0){
			header("Location:avisos/parcialParaEliminarNoEncontrado.php");
		} else {
			$ParcialDb -> elimiarParcialPorNombreYCurso($idCurso, "'".$nombre."'");
			header("Location:../index.php?idCurso='".$idCurso.'"');
		}
	}
	
	//Procesar eliminar alumno
	if ( !empty($_POST["form_eliminar_alumno"]) ){
		$idCurso = $_POST["form_eliminar_alumno"];
		$nombre = $_POST["nombre_alumno_eliminar"];
		
		$alumnosDb = alumnoDb::getInstance();
		$AlumnosCurso =  $alumnosDb->obtenerAlumnoPorNombreYCurso($idCurso, "'".$nombre."'");
		$numeroAlumnosEncontrados = (int)$AlumnosCurso -> num_rows;
		if($numeroAlumnosEncontrados === 0){
			header("Location:avisos/alumnoNoExistente.php?nombreAlumno='".$nombre.'"');
		} else {
			$alumnosDb -> eliminarAlumno("'".$nombre."'");
			header("Location:../index.php?idCurso='".$idCurso.'"');
		}
	}
	
	//procesar nuevo alumno
	if ( !empty($_POST["form_nuevo_alumno"]) ){

		$idCurso = $_POST["form_nuevo_alumno"];
		$nombre = $_POST["nombre_alumno"];
		
		$AlumnoDb = AlumnoDb::getInstance();
		
		$alumnoEnBD = $AlumnoDb -> obtenerAlumnoPorNombre("'".$nombre."'");
		$numeroAlumnosEnBd = (int)$alumnoEnBD -> num_rows;
		//echo($numeroAlumnosEnBd);
		if($numeroAlumnosEnBd === 0){
			$AlumnoDb -> nuevoAlumno($nombre, $idCurso);
			header("Location:../index.php?idCurso='".$idCurso.'"');
		} else {
			header("Location:avisos/alumnoExistente.php?nombreAlumno='".$nombre.'"');
		}
	}
//TODO: hacer que al dar de alta nuevo curso, vuelva a la misma página "curso.php".
//TODO: intentar separar este archivo en varios organizados por tipos de procesamiento (altas, bajas, actualizaciones , etc).





