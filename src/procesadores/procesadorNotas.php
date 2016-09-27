<?php
	require '../CalificacionDb.php';

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
	//actualizarBd();
	procesarNotaFinal();
}

function mostrarAviso() {
	header("Location:avisos/avisoNotaNoNumerica.php");
}

function actualizarBd(){}
	//manda al procesarFormularios para que lo haga

function procesarNotaFinal(){
	$notaFinal = 0;
	$calificacionBb = CalificacionDb::getInstance();
	$calificaciones = $calificacionBb->obtenerCalificacionesAlumnoCurso($idAlumnoNotaRecibido, $idCursoNotaRecibido);
	
	while ($row = $calificaciones->fetch_object()){
		$nota = $calificaciones->nota;
		$peso = $calificaciones->id_curso->peso;
		$notaFinal += $nota * ($peso/100);
	}
	echo $notaFinal;
	
}


