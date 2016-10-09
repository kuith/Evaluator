<?php

	require "/src/Conexion.php";
	require "/src/CalificacionDb.php";
	
	$idCalificacion = $_GET["idCalificacion"] ;
	$nota = (float)$_GET["nota"];
	$notaAntes = (float)$_GET["notaAntes"];
	
	$notaFormateada = number_format($nota, 2);
	
	if ($notaFormateada > 10 || $notaFormateada < 0){
		//aqui debería no hacer nada, pero aún no sé cómo hcerlo.
	}else{
		$calificacionDB = CalificacionDb::getInstance();
		$calificacionDB->actualizarNota($idCalificacion, $notaFormateada);
	}
	
//TODO: no hacer nada cuando la nota no sea correcta.
	