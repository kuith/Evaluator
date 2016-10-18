<?php
    require "/src/Conexion.php";
    require "/src/CalificacionDb.php";
    require "/src/ParcialDb.php";
	
    //define("NOMBRE_PARCIAL_FINAL", "Final");
    if (!defined('NOMBRE_PARCIAL_FINAL')) define('NOMBRE_PARCIAL_FINAL', 'Final');

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
        global $idCurso, $idCalificacion;
		        
	$idFinal = obtenerIdFinal();
		
        $califDb = CalificacionDb::getInstance();
        $calificacion = $califDb->obtenerCalificacion($idCalificacion);
        $calificacionRow = mysqli_fetch_assoc($calificacion);
	
        $idAlumno = $calificacionRow["id_alumno"];
				    
        $calificaciones = $califDb->obtenerCalificacionesAlumnoCursoNoFinal($idAlumno, $idCurso, $idFinal);
        $notaFinal = 0;
	$parcialDb = parcialDb::getInstance();
	
        While($calificacionesRow = $calificaciones->fetch_object()){
            $pesoParcial = $parcialDb->obtenerPesoPArcialPorId($calificacionesRow->id_parcial);
            $pesoParcialRow = mysqli_fetch_assoc($pesoParcial);
            $peso = (int)$pesoParcialRow["peso"];
	
            $notaRow = (float)$calificacionesRow->nota;
            $notaFinal += ((($notaRow)*$peso)/100);
        }
		
        $notaFinalActualizada = number_format($notaFinal,2);
        	
        $calificacionDb = CalificacionDb::getInstance();
	$idCalFinal = obtenerIdCalificacionFinal($idAlumno,$idFinal);
        
	$calificacionDb->actualizarNota($idCalFinal, $notaFinalActualizada);
	print($notaFinalActualizada);
    }
		
	function obtenerIdFinal(){
            global $idCurso;
	
            $parcialDb = parcialDb::getInstance();
            $idFinal  = $parcialDb->obtenerIdParcialPorNombreCurso("'".NOMBRE_PARCIAL_FINAL."'",  $idCurso);
            $idFinalRow = mysqli_fetch_assoc($idFinal);
            $idParcialFinal = (int)$idFinalRow["id"];
            return $idParcialFinal;
	}
	
	function obtenerIdCalificacionFinal($idAlumnoParam, $idFinalParam){
	
		$calificacionDb = CalificacionDb::getInstance();
        $idCalificacion =  $calificacionDb->obtenerIdCalificacionIdAlumnoIdParcial($idAlumnoParam, $idFinalParam);
        $idCalificacionRow = mysqli_fetch_assoc($idCalificacion);
        $idCalificacionFinal = (int)$idCalificacionRow["id"];
		return $idCalificacionFinal;
	}
	
//TODO: avisar y no hacer nada cuando la nota no sea correcta.
//TODO: hacer que si se escribe solo un número entero, se complete automaticamente con dos decimales a cero.
	
