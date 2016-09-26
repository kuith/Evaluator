<?php
	$idAlumnoNotaRecibido = $_GET['idAlumnoNota'];
	$idCursoNotaRecibido = $_GET['idCursoNota'];
	$idParcialNotaRecibido = $_GET['idParcialNota'];
	$notaRecibida = $_GET['nota'];
	
	echo 'Se ha recibido.  idAlumno = ' . $idAlumnoNotaRecibido . '. idCurso = ' . $idCursoNotaRecibido . '. idParcial = ' . $idParcialNotaRecibido . '. nota = ' . $notaRecibida . '.';

if(is_numeric($notaRecibida)){
	procesarNota();
		
} else {
	mostrarAviso();
}


function procesarNota() {
	actualizarBd();
	prcesarNotaFinal();
}

function mostrarAviso() {
	header("Location:avisos/avisoNotaNoNumerica.php");
}

function actualizarBd(){}
	//manda al procesarFormularios para que lo haga

function procesarNotaFinal(){}
	//manda al procesar formularios para que lo haga.
	



