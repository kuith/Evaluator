<?php

	require "/src/Conexion.php";
	require "/src/CalificacionDb.php";
	
	$idCalificacion = $_GET["idCalificacion"] ;
	$nota = $_GET["nota"] ;
	
	$calificacionDB = CalificacionDb::getInstance();
	$calificacionDB->actualizarNota($idCalificacion, $nota);
	
	