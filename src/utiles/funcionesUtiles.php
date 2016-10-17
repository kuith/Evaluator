<?php
	//define("NOMBRE_PARCIAL_FINAL", "Final");
        if (!defined('NOMBRE_PARCIAL_FINAL')) define('NOMBRE_PARCIAL_FINAL', 'Final');
	
	function obtenerIdFinal($idCurso){
		$parcialDb = parcialDb::getInstance();
		$idFinal  = $parcialDb->obtenerIdParcialPorNombreCurso("'".NOMBRE_PARCIAL_FINAL."'",  $idCurso);
		$idFinalRow = mysqli_fetch_assoc($idFinal);
		$idParcialFinal = (int)$idFinalRow["id"];
		return $idParcialFinal;
	}
	
	function obteneridAlumnoPorNombre($nombreAlumno){
		$alumnoDb = AlumnoDb::getInstance();
		$idAlumnoBuscado = $alumnoDb->obtenerAlumnoPorNombre("'".$nombreAlumno."'");
		$idAlumnoRow = mysqli_fetch_assoc($idAlumnoBuscado);
		$idAlumno = (int)$idAlumnoRow["id"];
		return $idAlumno;
	}
	
	function nuevaCalificacion($idAlumno, $idCurso, $idParcial, $nota){
		$calificacionDb = CalificacionDb::getInstance();
		$calificacionDb->nuevaCalificacion($idAlumno, $idCurso, $idParcial, $nota);
	}

	function obtenerIdParcialPorNombreCurso($nombreParcial, $idCursoParcial ){
		$parcialNuevoDB = parcialDb::getInstance();
		$parcialN = $parcialNuevoDB ->obtenerIdParcialPorNombreCurso("'".$nombreParcial."'", $idCursoParcial);
		$idParcial = mysqli_fetch_assoc($parcialN);
		$idParcialNuevo = (int)$idParcial['id'];
		return $idParcialNuevo;
	}
