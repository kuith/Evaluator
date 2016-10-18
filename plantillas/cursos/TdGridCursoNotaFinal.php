<?php
    //$ParcialDb = parcialDb::getInstance();
    //$idParcialFinal = $ParcialDb->obtenerIdParcialFinal();
    //$idRow = mysqli_fetch_assoc($idParcialFinal);
    //$idFinal = (int)$idRow['id'];
    //$celdaNotaId = 'celdaNotaFinal'.$idFinal;

    if (!defined('NOMBRE_PARCIAL_FINAL')) define('NOMBRE_PARCIAL_FINAL', 'Final');
    
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
	

    //TODO: poner botones de eliminar todos los alumnos y todos los parciales, eliminando los datos en cascada.
    //TODO: poner accesos a la pagina de inicio.
    //TODO: filtrar el acceso con contraseña.
    