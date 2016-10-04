<?php

	require "/src/Conexion.php";
	require "/src/CalificacionDb.php";
	
	$idCalificacion = $_GET["idCalificacion"] ;
	$nota = $_GET["nota"] ;
	
	$calificacionDB = CalificacionDb::getInstance();
	$calificacionDB->actualizarNota($idCalificacion, $nota);
	
	//Expresion regular para un numero del 0 al 10 con dos cifras decimales: ^(10|[0-9](,[0-9]{1,2})?)$------->/gm?