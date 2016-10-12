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
		//$calificacionDB->actualizarNota($idCalificacion, actualizarNotaFinal());
		actualizarNotaFinal();
	}
	
	function actualizarNotaFinal(){
		global $idCurso;
		global $idCalificacion;
		$notaFinalActualizada = 0;
		
		$parcialDb = parcialDb::getInstance();
		$idFinal  = $parcialDb->obtenerIdParcialPorNombreCurso("'".NOMBRE_PARCIAL_FINAL."'",  $idCurso);
		$idFinalRow = mysqli_fetch_assoc($idFinal);
		$idParcialFinal = (int)$idFinalRow["id"];
		
        $calificacionDb = CalificacionDb::getInstance();
		$calificacion = $calificacionDb->obtenerCalificacion($idCalificacion);
		$calificacionRow = mysqli_fetch_assoc($calificacion);
		
		$idAlumno = (int)$calificacionRow["id_alumno"];
		$idCurso = (int)$calificacionRow["id_curso"];
				    
        $calificaciones = $calificacionDb->obtenerCalificacionesAlumnoCursoNoFinal($idAlumno, $idCurso, $idParcialFinal);
		$notaFinal = 0;
		While($calificacionesRow = $calificaciones->fetch_object()){
			$pesoParcial = $parcialDb->obtenerPesoPArcialPorId($calificacionesRow->id_parcial);
			$pesoParcialRow = mysqli_fetch_assoc($pesoParcial);
			$peso = (int)$pesoParcialRow["peso"];
			
			$notaRow = (float)$calificacionesRow->nota;
			$notaFinal += ((($notaRow)*$peso)/100);
		}
		$notaFinalActualizada = number_format($notaFinal,2);
		//return $notaFinalActualizada;
		echo ($notaFinalActualizada);
		
		$calificacionDb = CalificacionDb::getInstance();
		$idCalificacion =  $calificacionDb->obtenerIdCalificacionIdAlumnoIdParcial($idAlumno, $idFinal);
		$idCalificacionRow = mysqli_fetch_assoc($idCalificacion);
		$idCalificacionFinal = (int)$idCalificacionRow["id"];
		
		$calificacionDB->actualizarNota($idCalificacionFinal, $notaFinalActualizada);
				
    }
	
//TODO: no hacer nada cuando la nota no sea correcta.
//TODO: hacer que tambien valide la nota (la escriba y actualice) no solo cuando se hace clic al cambiar de campo sino tambien al tabular
	