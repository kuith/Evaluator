<?php
	//$ParcialDb = parcialDb::getInstance();
	//$idParcialFinal = $ParcialDb->obtenerIdParcialFinal();
	//$idRow = mysqli_fetch_assoc($idParcialFinal);
	//$idFinal = (int)$idRow['id'];
    //$celdaNotaId = 'celdaNotaFinal'.$idFinal;
	define("NOMBRE_PARCIAL_FINAL", "Final");
	$ParcialDb = parcialDb::getInstance();
	$idParcialFinal = $ParcialDb->obtenerIdParcialPorNombreCurso("'".NOMBRE_PARCIAL_FINAL."'",$idCurso);
	$idRow = mysqli_fetch_assoc($idParcialFinal);
	$idFinal = (int)$idRow['id'];
	$celdaNotaId = 'celdaNotaFinal'.$idFinal;
	
	$pesoTotal = $ParcialDb->obtenerPesoTotalParcialesCurso($idCurso);
	$pesoRow = mysqli_fetch_assoc($pesoTotal);
	$pesoTotalParciales = (int)$pesoRow['pesoTotal'];
	
	$calificacionDB = CalificacionDb::getInstance();
	$calificacionFinal = $calificacionesDb->obtenerNotaAlumnoCursoParcial($row->id, $idCurso, $idFinal);
	$CalificacionFinalRow = mysqli_fetch_assoc($calificacionFinal);
	$notaFinal = number_format($CalificacionFinalRow['nota'],2);
		
	printf ('<td class = "celdaNotaFinal" id="%s" data-peso-total="%s"> %s </td>', $celdaNotaId, $pesoTotalParciales, $notaFinal);
	

//TODO: lograr que la celda de la nota Final avise de si se ha alcanzado el 100 en el peso de los parciales
//TODO: lograr que de igual el orden en que se añadan parciales o alumnos, en cuanto a la inicializacion de las notas a cero.