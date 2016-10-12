<?php
	$ParcialDb = parcialDb::getInstance();
	$idParcialFinal = $ParcialDb->obtenerIdParcialFinal();
	$idRow = mysqli_fetch_assoc($idParcialFinal);
	$idFinal = (int)$idRow['id'];
	
	$pesoTotal = $ParcialDb->obtenerPesoTotalParcialesCurso($idCurso);
	$pesoRow = mysqli_fetch_assoc($pesoTotal);
	$pesoTotal = (int)$pesoRow['pesoTotal'];
	
	$calificacionDB = CalificacionDb::getInstance();
	$calificacionFinal = $calificacionesDb->obtenerNotaAlumnoCursoParcial($row->id, $idCurso, $idFinal);
	$CalificacionFinalRow = mysqli_fetch_assoc($calificacionFinal);
	$notaFinal = number_format($CalificacionFinalRow['nota'],2);
		
	printf ('<td class = "celdaNotaFinal" id="%s" data-peso-total="%s"> %s </td>', $celdaNotaId, $pesoTotal, $notaFinal);
	