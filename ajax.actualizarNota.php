<?php

	require "/src/Conexion.php";
	require "/src/CalificacionDb.php";
	
	$idCalificacion = $_GET["idCalificacion"] ;
	$nota = (float)$_GET["nota"];
	$notaAntes = (float)$_GET["notaAntes"];
	
	$notaFormateada = number_format($nota, 2);
	
	if ($notaFormateada > 10 || $notaFormateada < 0){
		header("Location:src/pruebas.php");
	}else{
		$calificacionDB = CalificacionDb::getInstance();
		$calificacionDB->actualizarNota($idCalificacion, $notaFormateada);
	}
	
