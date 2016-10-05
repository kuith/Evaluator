<?php

	require "/src/Conexion.php";
	require "/src/CalificacionDb.php";
	
	$idCalificacion = $_GET["idCalificacion"] ;
	$nota = $_GET["nota"] ;
	
	if(preg_match("^(10|[0-9](,[0-9]{1,2})?)$/gm", $nota)){
		$calificacionDB = CalificacionDb::getInstance();
		$calificacionDB->actualizarNota($idCalificacion, $nota);
	} else {
		header("Location:src/pruebas.php");
	}
		
	
	//Expresion regular para un numero del 0 al 10 con dos cifras decimales: ^(10|[0-9](,[0-9]{1,2})?)$------->/gm?
	
//	re = /^(10|[0-9](,[0-9]{1,2})?)$/gm,
//		testCadena = function (e){
//			var ok = re.exec(limpiarNota(e.target.innerHTML));
//			if (!ok)
//				window.alert("Cadena NO válida");
//			else
//				window.alert("La cadena SI es válida");
//		},