<?php

	require "/src/Conexion.php";
	require "/src/CalificacionDb.php";
	require "/src/ParcialDb.php";
	
	define("NOMBRE_PARCIAL_FINAL", "Final");
	
	$idCalificacion = $_GET["idCalificacion"] ;
	$nota = (float)$_GET["nota"];
	$notaAntes = (float)$_GET["notaAntes"];
	$idCurso = (int)$_GET["idCurso"];
	
	$notaFormateada = number_format($nota, 2);
	
	if ($notaFormateada > 10 || $notaFormateada < 0){
		//aqui debería no hacer nada, pero aún no sé cómo hcerlo.
	}else{
		$calificacionDB = CalificacionDb::getInstance();
		$calificacionDB->actualizarNota($idCalificacion, $notaFormateada);
		actualizarNotaFinal();
	}
	
	
	function actualizarNotaFinal(){
		global $idCurso;
		global $idCalificacion;
		
		$parcialDb = parcialDb::getInstance();
		$idFinal  = $parcialDb->obtenerIdParcialPorNombre(NOMBRE_PARCIAL_FINAL,  $idCurso);
		$idFinalRow = mysqli_fetch_assoc($idFinal);
		$idParcialFinal = (int)$idFinalRow["id"];
		
        $calificacionDb = CalificacionDb::getInstance();
		$calificacion = $calificacionDb->obtenerCalificacion($idCalificacion);
		$calificacionRow = mysqli_fetch_assoc($calificacion);
		
		$idAlumno = (int)$calificacionRow["id_alumno"];
		$idCurso = (int)$calificacionRow["id_curso"];
				    
        $calificaciones = $calificacionDb->obtenerCalificacionesAlumnoCursoNoFinal($idAlumno, $idCurso, $idParcialFinal);
		While($calificacionesRow = $calificaciones->fetch_object()){
			$pesoParcial = $parcialDb->obtenerPesoPArcialPorId($calificacionesRow->id_parcial);
			$pesoParcialRow = mysqli_fetch_assoc($pesoParcial);
			$peso = (int)$pesoParcialRow["peso"];
			
			$notaFinal =+ (float)((($calificacionesRow->nota)*$peso)/100);
			printf($notaFinal);
		}
		
    }
	
//TODO: no hacer nada cuando la nota no sea correcta.
	